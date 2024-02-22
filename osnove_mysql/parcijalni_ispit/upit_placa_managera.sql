SELECT 
-- * 
e.emp_no
, e.first_name
, e.last_name
-- , s.salary
, MIN(s.from_date) AS dat_zapos
, MAX(s.to_date) AS dat_obracuna
, d.dept_name
-- , DATEDIFF(s.from_date ,s.to_date)
-- , PERIOD_DIFF(200905,200811)
, SUM(ABS( PERIOD_DIFF(CONCAT(YEAR(s.from_date),MONTH(s.from_date))
,CONCAT(YEAR(s.to_date),MONTH(s.to_date))))) AS mjeseciplace
, SUM(ABS( PERIOD_DIFF(CONCAT(YEAR(s.from_date),MONTH(s.from_date))
,CONCAT(YEAR(s.to_date),MONTH(s.to_date))))*s.salary ) AS mjeseciplace
FROM 
employees e LEFT JOIN salaries s USING(emp_no)
LEFT JOIN dept_manager dm USING(emp_no) 
LEFT JOIN departments d USING(dept_no)
WHERE dept_no IS NOT NULL  -- eliminacija svih koji nisu manageri
GROUP BY e.emp_no
;