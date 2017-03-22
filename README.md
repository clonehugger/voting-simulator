# voting-simulator
A voting simulator where you can count votes &amp; view progress on elections.

<u>Data Base</u>
Data base definition as follows: 

mysql> desc votos;
+------------+---------------+------+-----+---------+-------+
| Field      | Type          | Null | Key | Default | Extra |
+------------+---------------+------+-----+---------+-------+
| partido    | varchar(20)   | YES  |     | NULL    |       |
| votos      | int(10)       | YES  |     | NULL    |       |
| porcentaje | decimal(10,0) | YES  |     | NULL    |       |
| tendencia  | varchar(5)    | YES  |     | NULL    |       |
+------------+---------------+------+-----+---------+-------+
4 rows in set (0.19 sec)

Registers for use of php test code:

mysql> select * from votos
    -> ;
+----------+-------+------------+-----------+
| partido  | votos | porcentaje | tendencia |
+----------+-------+------------+-----------+
| AMARILLO |     3 |         12 | .         |
| AZUL     |     5 |         20 | .         |
| MORADO   |     4 |         16 | .         |
| VERDE    |     1 |          4 | .         |
| OTRO     |    12 |         48 | .         |
+----------+-------+------------+-----------+
5 rows in set (0.00 sec)
