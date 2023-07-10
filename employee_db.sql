SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `departments` (
  `DepartmentID` int(11) NOT NULL,
  `Department` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `departments` (`DepartmentID`, `Department`) VALUES
(1, 'IT'),
(2, 'HR'),
(3, 'Marketing'),
(4, 'Finance');



CREATE TABLE `employees` (
  `EmployeeID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Salary` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `departments`
  ADD PRIMARY KEY (`DepartmentID`);


ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeID`);


ALTER TABLE `employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;


