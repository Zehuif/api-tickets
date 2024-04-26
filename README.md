# API-TICKETS

Se instala Docker utilizando Sail.
Se usa postgresql como base de datos.

## Instrucciones de uso

1) Clonar el repositorio.
```bash
    https://github.com/Zehuif/api-tickets.git
```
2) Iniciar contenedores.
```bash
    cd api-tickets
    ./vendor/bin/sail up
```
3) Los endpoint están en:
```url
   http://0.0.0.0:80/api/v1
```
Se adjunta en la carpeta APOSTMAN los resultados de los endpoints (importar en postman).

## Supuestos
1) Cada cliente solo puede comprar una entrada por pedido.
2) Un mismo cliente puede hacer varios pedidos.
3) Solo existe un lugar en donde se realizan los eventos (solo un escenario).
4) Cada evento tiene una cantidad máximo de asistentes.
5) Si la cantidad de ordenes es igual a la cantidad máxima de asistentes del evento, entonces no habrá más disponibilidad.

Quizás se me fue algún supuesto...

Hice pocos test y nose si están correctos. Aún no me manejo mucho con los test, esta fue mi primera vez aplicandolo.

## Base de datos
### Event
- Id (pk)
- Nombre
- Artista
- Información 
- Precio
- FechaHora_evento
- Duración 
- Capacidad
- Disponibilidad
- Creado en

### Purchase
- Id (pk)
- Id_event (fk)
- Id_cliente (fk)
- FechaHira_compra
- Metodo_pago
- Total

### Cliente
- id (pk)
- Nombre
- Mail
- Telefono
