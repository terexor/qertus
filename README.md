Programa dedicado a la generación y validación de código QR de certificado
con firma sin conexión a Internet.

El código QR generado en el servidor (con PHP) contiene datos necesarios que se requieren validar además de la firma.
Ese QR es decodificado por la aplicación (con JavaScript) y verifica si la firma fue hecha por el servidor.

Se usa encriptación asimétrica RSA con 2048 bits. Se distribuye la clave pública.

Vídeo explicativo: https://www.youtube.com/watch?v=w3MWiFxtgkw
