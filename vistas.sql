-----------------------
CREATE VIEW v_personal
AS
SELECT
    personal.idpersonas,
    personal.colegiatura,
    personal.idtipo,
    tipo_personal.tipo
FROM personal
    INNER JOIN tipo_personal ON personal.idtipo = tipo_personal.idtipo
------------------------

