# Test-Praca

baza danych MySQL oraz serwer apache uruchomiony przez XAMPP.


SELECT IFNULL((MAX(CAST(SUBSTRING_INDEX(numer_wysylki,'/',-1) AS UNSIGNED))+1),1) AS max_nr, MONTH(NOW()) AS `miesiac`, RIGHT(YEAR(NOW()),2) AS `rok`
                    FROM korespondencja_new
                    WHERE id_branch = 2 AND id_company=5 AND typ=0 AND LEFT(SUBSTRING_INDEX(numer_wysylki,'/',-2),2) = MONTH(NOW()) AND LEFT(SUBSTRING_INDEX(numer_wysylki,'/',-3),2) = RIGHT(YEAR(NOW()),2)
