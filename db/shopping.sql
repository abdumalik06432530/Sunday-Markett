
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `AdminId` int(11) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=Cs2;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`AdminId`, `UserName`, `Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE `category_master` (
  `CategoryId` int(11) NOT NULL,
  `CategoryName` varchar(20) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=Cs2;

-- Table structure for table `customer_registration`


CREATE TABLE `customer_registration` (
  `CustomerId` int(11) NOT NULL,
  `CustomerName` varchar(20) NOT NULL,
  `Address` varchar(400) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` bigint(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `BirthDate` date NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=Cs2;

-- Table structure for table `feedback_master`

CREATE TABLE `feedback_master` (
  `FeedbackId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `Feedback` varchar(200) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=Cs2;


-- Table structure for table `item_master`

CREATE TABLE `item_master` (
  `ItemId` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `ItemName` varchar(20) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Size` varchar(10) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Price` float NOT NULL,
  `Discount` float NOT NULL,
  `Total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=Cs1;


-- Table structure for table `offer_master`

CREATE TABLE `offer_master` (
  `OfferId` int(11) NOT NULL,
  `Offer` varchar(50) NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Valid` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=Cs2;

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `CartId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `ItemName` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Total` float NOT NULL,
  `OrderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=Cs2;

-- Table structure for table `shopping_cart_final`

CREATE TABLE `shopping_cart_final` (
  `CartId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `ItemName` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  'location' varchar(200),
  `Price` float NOT NULL,
  `Total` float NOT NULL,
  `OrderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=Cs2;

-- Indexes for table `admin_master`

ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `customer_registration`
--
ALTER TABLE `customer_registration`
  ADD PRIMARY KEY (`CustomerId`);

--
-- Indexes for table `feedback_master`
--
ALTER TABLE `feedback_master`
  ADD PRIMARY KEY (`FeedbackId`);

--
-- Indexes for table `item_master`
--
ALTER TABLE `item_master`
  ADD PRIMARY KEY (`ItemId`);

--
-- Indexes for table `offer_master`
--
ALTER TABLE `offer_master`
  ADD PRIMARY KEY (`OfferId`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`CartId`);

--
-- Indexes for table `shopping_cart_final`
--
ALTER TABLE `shopping_cart_final`
  ADD PRIMARY KEY (`CartId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_registration`
--
ALTER TABLE `customer_registration`
  MODIFY `CustomerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback_master`
--
ALTER TABLE `feedback_master`
  MODIFY `FeedbackId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_master`
--
ALTER TABLE `item_master`
  MODIFY `ItemId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer_master`
--
ALTER TABLE `offer_master`
  MODIFY `OfferId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `CartId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopping_cart_final`
--
ALTER TABLE `shopping_cart_final`
  MODIFY `CartId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
