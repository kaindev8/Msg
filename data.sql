DROP TABLE IF EXISTS `msg_admin`;
CREATE TABLE IF NOT EXISTS `msg_admin` (
    `id` int(10) UNSIGNED NOT NULL COMMENT '管理员ID',
    `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名',
    `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
    `salt` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '盐',
    `qq` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'QQ号',
    `logintime` bigint(16) DEFAULT NULL COMMENT '登录时间',
    `loginip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '登录IP',
    `token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Session标识',
    `status` int(1) COLLATE utf8mb4_unicode_ci DEFAULT 1 COMMENT '状态;1正常0封禁'
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT '管理员表';
--
--
--
DROP TABLE IF EXISTS `msg_info`;
CREATE TABLE IF NOT EXISTS `msg_info` (
    `id` int(10) UNSIGNED AUTO_INCREMENT NOT NULL COMMENT 'ID',
    `nickname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '昵称',
    `sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '签名',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
--
--
--
DROP TABLE IF EXISTS `msg_config`;
CREATE TABLE IF NOT EXISTS `msg_config` (
    `id` int(10) UNSIGNED AUTO_INCREMENT COMMENT 'ID',
    `sitename` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '网站名',
    `key` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '关键词',
    `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '网站描述',
    `icp` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ICP',
    `cherry` int(1) DEFAULT 1 COMMENT '樱花飘落:1=开启,0=关闭',
    `music` int(1) DEFAULT 1 COMMENT '背景音乐:1开启,0=关闭',
    `music_name` char(20) COLLATE utf8mb4_unicode_ci DEFAULT '小幸运.mp3' COMMENT '背景音乐名',
    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT '配置表';
--
--
--
DROP TABLE IF EXISTS `msg_message`;
CREATE TABLE IF NOT EXISTS `msg_message` (
    `id` int(10) UNSIGNED AUTO_INCREMENT NOT NULL COMMENT 'ID',
    `nickname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '昵称',
    `public` int(1) DEFAULT 1 COMMENT '是否公开:1=是,0=否',
    `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '内容',
    `time` DATETIME COMMENT '提交时间',
    `ip` varchar(50) NOT NULL COMMENT '提交IP',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT '信息表';
--
--
--
INSERT INTO `msg_admin` (`id`, `username`, `password`, `salt`, `qq`, `logintime`, `loginip`, `token`, `status`)
    VALUES
(1, 'admin', '47e7614cccd195e8745d776cd562ed8e', 'P7Y4L4Y8', '1361582519', 1666374210, '127.0.0.1', '482a97cb-1fa0-48e2-99ac-980e8b6e81e1', 1);
--
--
--
INSERT INTO `msg_info` (`nickname`, `sign`)
    VALUES
('溏心蛋', '你 一 定 能 够 成 为 你 想 要 去 成 为 的 人');
--
--
--
INSERT INTO `msg_config` (`sitename`, `key`, `desc`, `icp`, `cherry`, `music`, `music_name`)
    VALUES
('溏心蛋の朋友圈', '留言板', '溏心蛋の朋友圈', '湘ICP备2022008401号-1', 1, 1, '小幸运.mp3');