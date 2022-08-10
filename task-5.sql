#  Задание 5
#
# создаём таблицы и заполняем данными
CREATE TABLE `goods` (
                         `id` int unsigned  AUTO_INCREMENT,
                         `name` TEXT,
                         PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

insert into goods(name) values ('name1');
insert into goods(name) values ('ahahah5');

CREATE TABLE `tags` (
                        `id` int unsigned  AUTO_INCREMENT,
                        `name` TEXT,
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

insert into tags(name) values ('fruit');
insert into tags(name) values ('vegeto');
insert into tags(name) values ('glass');
insert into tags(name) values ('wood');
insert into tags(name) values ('river');
insert into tags(name) values ('sun');

CREATE TABLE `goods_tags` (
                              `tag_id` int,
                              `goods_id` int,
                              UNIQUE(tag_id, goods_id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

insert into goods_tags(tag_id, goods_id) values (1,1);
insert into goods_tags(tag_id, goods_id) values (2,1);
insert into goods_tags(tag_id, goods_id) values (3,1);
insert into goods_tags(tag_id, goods_id) values (4,1);
insert into goods_tags(tag_id, goods_id) values (5,1);
insert into goods_tags(tag_id, goods_id) values (6,1);
insert into goods_tags(tag_id, goods_id) values (2,2);
insert into goods_tags(tag_id, goods_id) values (1,2);

# финальный запрос для решения задачи
SELECT goods.id, goods.name
FROM goods JOIN
     goods_tags ON goods_tags.goods_id = goods.id
GROUP BY goods.id, goods.name
HAVING COUNT(DISTINCT goods_tags.tag_id) = (SELECT COUNT(tags.id) FROM tags)

