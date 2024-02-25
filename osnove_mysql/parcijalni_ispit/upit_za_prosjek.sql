SELECT *
, AVG(salary) AS prosjekPlace -- 176.6667
FROM salaries;

SELECT *
, AVG(salary) AS prosjekPlace  -- 150, 230
FROM salaries
GROUP BY emp_no
;



-- trebam broj 190
SET @var1 = "sdsd";
SELECT @var1;

SELECT 
AVG(prosjekPlace) AS Ukupniprosjek190 INTO @var1

 FROM (
SELECT *
, AVG(salary) AS prosjekPlace  -- 150, 230
FROM salaries
GROUP BY emp_no) pros1
;

SELECT @var1;