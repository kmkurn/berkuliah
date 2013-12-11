-- --------------------------------------------------------

--
-- Table structure for table `akses_info`
--
CREATE TABLE IF NOT EXISTS `akses_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akses_info`
--

ALTER TABLE `akses_info`
  ADD CONSTRAINT `akses_info_fk_note` FOREIGN KEY (`note_id`) REFERENCES `bk_note` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `akses_info`
--  
 ALTER TABLE `akses_info`
  ADD CONSTRAINT `akses_info_fk_user` FOREIGN KEY (`user_id`) REFERENCES `bk_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

