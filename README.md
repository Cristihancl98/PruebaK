# prueba_k
Prueba Konecta: proyecto que permite aún administrado, registra, editar, eliminar, listar, producto y visualizar ventas que se realicen en su tienda, en la cual se permite simular la compra de productos y restar al stock de dicho producto.

# base de datos, esta la opcion de copiar y pegar o la de importar bd_cafeteria.sql
```
CREATE DATABASE bd_cafeteriakonecta;

```
# luego de ejecutar el comando php artisan migrate:refresh --seed para que se generen las bases de datos

# consultas directas en base de datos

### Realizar una consulta que permita conocer cuál es el producto que más stock tiene.
SELECT id, nombre, MAX(stock) as stock  FROM `tbl_productos` WHERE estado = 1;

### Realizar una consulta que permita conocer cuál es el producto más vendido.
SELECT nombre, SUM(stock) as cantidad, SUM(precio) as precio FROM `tbl_ventas` GROUP BY nombre ORDER by cantidad DESC LIMIT 1;

# Pasos para la instalacion y prueba
### 1) installar Wampserver
### 2) ingrese a consola para copiar y pegar el comando  php artisan serve y luego se dirigue a la ruta http://127.0.0.1:8000
### 4) cuando inicias no se visualizaran producto hasta que no ingreses al admin y registres productos
### 5) las credenciales del admin son usuario: admin y contraseña: admin123 por defecto
### 6) al inicar al Dash primero debes registrar una categoria, para poder registrar un producto.
### 7) cuando registres el producto automaticamente puedes volver a la tienda inicial para comprar productos visualizar todos los producto en la caferia para la compra, o seleccionar por categoria

### Cualquier inquietud durante el test y prueba mi numero 323 2346794
