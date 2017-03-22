# voting-simulator
A voting simulator where you can count votes &amp; view progress on elections.

<u>Data Base</u>
Data base definition as follows: <br>

mysql> desc votos;<br>
+------------+---------------+------+-----+---------+-------+<br>
| Field      | Type          | Null | Key | Default | Extra |<br>
+------------+---------------+------+-----+---------+-------+<br>
| partido    | varchar(20)   | YES  |     | NULL    |       |<br>
| votos      | int(10)       | YES  |     | NULL    |       |<br>
| porcentaje | decimal(10,0) | YES  |     | NULL    |       |<br>
| tendencia  | varchar(5)    | YES  |     | NULL    |       |<br>
+------------+---------------+------+-----+---------+-------+<br>
4 rows in set (0.19 sec)<br>

Registers for use of php test code:<br>

mysql> select * from votos<br>
    -> ;<br>
+----------+-------+------------+-----------+<br>
| partido  | votos | porcentaje | tendencia |<br>
+----------+-------+------------+-----------+<br>
| AMARILLO |     3 |         12 | .         |<br>
| AZUL     |     5 |         20 | .         |<br>
| MORADO   |     4 |         16 | .         |<br>
| VERDE    |     1 |          4 | .         |<br>
| OTRO     |    12 |         48 | .         |<br>
+----------+-------+------------+-----------+<br>
5 rows in set (0.00 sec)<br>
