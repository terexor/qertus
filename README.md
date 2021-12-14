Programa dedicado a la generación y validación de código QR de certificado
con firma sin conexión a Internet.

El código QR generado en el servidor (con PHP) contiene datos necesarios que se requieren validar además de la firma.
Ese QR es decodificado por la aplicación (con JavaScript) y verifica si la firma fue hecha por el servidor.

Se usa encriptación asimétrica RSA con 2048 bits. Se distribuye la clave pública.

## Generar clave privada
openssl req -x509 -nodes -new -sha256 -days 90 -newkey rsa:2048 -keyout RootCA.key -out RootCA.pem -subj "/C=PE/CN=Terexor-Salutis-CA"
openssl x509 -outform pem -in RootCA.pem -out RootCA.crt

## Extraer clave pública
openssl x509 -pubkey -noout -in RootCA.pem > RootCA.pub

Video demostrativo: https://www.youtube.com/watch?v=w3MWiFxtgkw
