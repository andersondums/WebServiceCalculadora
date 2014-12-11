/* caso o webservice não conecte pro erro de HTTPSYS, copiar a DLL msvcr71.dll
   para system32 e SysWOW64 */

DEF VAR hWebService AS HANDLE NO-UNDO.
DEF VAR hPort       AS HANDLE NO-UNDO.
DEF VAR hOperacao   AS HANDLE NO-UNDO.

DEF VAR c-resultado AS LONGCHAR NO-UNDO.

CREATE SERVER hWebService.

hWebService:CONNECT("-WSDL 'http://www.dums.com.br/WSCalculadora/soap-server.php?wsdl' ") NO-ERROR.

IF NOT hWebService:CONNECTED() THEN DO:
    DEFINE VARIABLE errmsg AS CHARACTER NO-UNDO INIT "SERVER NOT CONNECTED~n".
    DEFINE VARIABLE i AS INTEGER NO-UNDO.
    DO i = 1 TO ERROR-STATUS:NUM-MESSAGES:
        errmsg = errmsg + ERROR-STATUS:GET-MESSAGE(i) + '~n'.
    END.

    MESSAGE errmsg VIEW-AS ALERT-BOX ERROR.

    STOP.
END.

RUN CalculadoraPort SET hPort ON hWebService.

/* chamada passando cada node como parametro */
RUN soma IN hPort (INPUT "2", INPUT "3", OUTPUT c-resultado).
              
DISP "Soma: " STRING(c-resultado).

RUN subtrai IN hPort (INPUT "2", INPUT "3", OUTPUT c-resultado).

DISP "Subtrai: " STRING(c-resultado).

hWebService:DISCONNECT().
DELETE OBJECT hWebService.
