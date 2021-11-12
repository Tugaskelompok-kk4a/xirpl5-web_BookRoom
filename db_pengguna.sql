CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `umur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
 
INSERT INTO `pengguna` (`id`, `nama`, `alamat`, `gender`, `umur`) VALUES
(1, 'Eko ', 'Jl Subrantas', 'Laki-laki', 30),
(2, 'Rini', 'Jl Sialang', 'Perempuan', 20),
(3, 'Trisna Nia Al', 'Jl Kemiri Sawah', 'Perempuan', 20);
 
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judulbuku` varchar(100) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `thn_terbit` varchar(30) NOT NULL,
  `jenisbuku` varchar(20) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judulbuku`, `penulis`, `thn_terbit`, `jenisbuku`, `Status`) VALUES
(1, 'Penakluk samudra hindia', 'Bintang', '2005', 'Nonfiksi', 'Ada');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;





