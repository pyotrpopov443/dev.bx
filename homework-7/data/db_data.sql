USE dev;

INSERT INTO director (ID, NAME)
VALUES (1, 'Кристофер Нолан'),
       (2, 'Ли Анкрич'),
       (3, 'Оливье Накаш'),
       (4, 'Гай Ричи'),
       (5, 'Дэмьен Шазелл'),
       (6, 'Питер Фаррелли'),
       (7, 'Мартин Скорсезе'),
       (8, 'Квентин Тарантино'),
       (9, 'Питер Джексон'),
       (10, 'Пит Доктер'),
       (11, 'Дэвид Йейтс'),
       (12, 'Байрон Ховард'),
       (13, 'Мэл Гибсон'),
       (14, 'Джеймс Мэнголд'),
       (15, 'Энтони Руссо'),
       (16, 'Томм Мур'),
       (17, 'Том Хупер'),
       (18, 'Джеймс Ганн'),
       (19, 'Боб Персичетти'),
       (20, 'Жан-Марк Валле'),
       (21, 'Тейт Тейлор'),
       (22, 'Ханнес Холм'),
       (23, 'Райан Джонсон'),
       (24, 'Джозеф Косински'),
       (25, 'Дэвид Добкин'),
       (26, 'Дэвид Финчер');


INSERT INTO actor (ID, NAME)
VALUES (1, 'Мэттью МакКонахи'),
       (2, 'Энн Хэтэуэй'),
       (3, 'Джессика Честейн'),
       (4, 'Энтони Гонсалес'),
       (5, 'Гаэль Гарсиа Берналь'),
       (6, 'Бенджамин Брэтт'),
       (7, 'Леонардо ДиКаприо'),
       (8, 'Джозеф Гордон-Левитт'),
       (9, 'Эллиот Пейдж'),
       (10, 'Том Харди'),
       (11, 'Франсуа Клюзе'),
       (12, 'Омар Си'),
       (13, 'Чарли Ханнэм'),
       (14, 'Генри Голдинг'),
       (15, 'Майлз Теллер'),
       (16, 'Дж.К. Симмонс'),
       (17, 'Вигго Мортенсен'),
       (18, 'Махершала Али'),
       (19, 'Джона Хилл'),
       (20, 'Марго Робби'),
       (21, 'Джейми Фокс'),
       (22, 'Кристоф Вальц'),
       (23, 'Мартин Фриман'),
       (24, 'Иэн Маккеллен'),
       (25, 'Ричард Армитедж'),
       (26, 'Курт Рассел'),
       (27, 'Сэмюэл Л. Джексон'),
       (28, 'Тим Рот'),
       (29, 'Эми Полер'),
       (30, 'Филлис Смит'),
       (31, 'Дэниэл Рэдклифф'),
       (32, 'Руперт Гринт'),
       (33, 'Эмма Уотсон'),
       (34, 'Джиннифер Гудвин'),
       (35, 'Джейсон Бейтман'),
       (36, 'Эндрю Гарфилд'),
       (37, 'Сэм Уортингтон'),
       (38, 'Кристиан Бэйл'),
       (39, 'Мэтт Дэймон'),
       (40, 'Роберт Дауни мл.'),
       (41, 'Крис Хемсворт'),
       (42, 'Марк Руффало'),
       (43, 'Дэвид Роул'),
       (44, 'Брендан Глисон'),
       (45, 'Колин Фёрт'),
       (46, 'Джеффри Раш'),
       (47, 'Крис Пратт'),
       (48, 'Зои Салдана'),
       (49, 'Дэйв Батиста'),
       (50, 'Брэдли Купер'),
       (51, 'Шамеик Мур'),
       (52, 'Джейк Джонсон'),
       (53, 'Дженнифер Гарнер'),
       (54, 'Эмма Стоун'),
       (55, 'Виола Дэвис'),
       (56, 'Рольф Лассгор'),
       (57, 'Бахар Парс'),
       (58, 'Дэниэл Крэйг'),
       (59, 'Ана де Армас'),
       (60, 'Крис Эванс'),
       (61, 'Джош Бролин'),
       (62, 'Майлз Теллер'),
       (63, 'Роберт Дювалл'),
       (64, 'Бен Аффлек'),
       (65, 'Розамунд Пайк'),
       (66, 'Нил Патрик Харрис');

INSERT INTO movie (ID, TITLE, ORIGINAL_TITLE, DESCRIPTION, DURATION, AGE_RESTRICTION, RELEASE_DATE, RATING, DIRECTOR_ID)
VALUES (1, 'Интерстеллар', 'Interstellar', 'Когда засуха, пыльные бури и вымирание растений приводят человечество к продовольственному кризису, коллектив исследователей и учёных отправляется сквозь червоточину (которая предположительно соединяет области пространства-времени через большое расстояние) в путешествие, чтобы превзойти прежние ограничения для космических путешествий человека и найти планету с подходящими для человечества условиями.', 169, 16, 2014, 8.6, 1),
       (2, 'Тайна Коко', 'Coco', '12-летний Мигель живёт в мексиканской деревушке в семье сапожников и тайно мечтает стать музыкантом. Тайно, потому что в его семье музыка считается проклятием. Когда-то его прапрадед оставил жену, прапрабабку Мигеля, ради мечты, которая теперь не даёт спокойно жить и его праправнуку. С тех пор музыкальная тема в семье стала табу. Мигель обнаруживает, что между ним и его любимым певцом Эрнесто де ла Крусом, ныне покойным, существует некая связь. Паренёк отправляется к своему кумиру в Страну Мёртвых, где встречает души предков. Мигель знакомится там с духом-скелетом по имени Гектор, который становится его проводником. Вдвоём они отправляются на поиски де ла Круса.', 105, 12, 2017, 8.6, 2),
       (3, 'Начало', 'Inception', 'Кобб – талантливый вор, лучший из лучших в опасном искусстве извлечения: он крадет ценные секреты из глубин подсознания во время сна, когда человеческий разум наиболее уязвим. Редкие способности Кобба сделали его ценным игроком в привычном к предательству мире промышленного шпионажа, но они же превратили его в извечного беглеца и лишили всего, что он когда-либо любил.', 148, 12, 2010, 8.7, 1),
       (4, '1+1', 'Intouchables', 'Пострадав в результате несчастного случая, богатый аристократ Филипп нанимает в помощники человека, который менее всего подходит для этой работы, – молодого жителя предместья Дрисса, только что освободившегося из тюрьмы. Несмотря на то, что Филипп прикован к инвалидному креслу, Дриссу удается привнести в размеренную жизнь аристократа дух приключений.', 112, 16, 2011, 8.8, 3),
       (5, 'Джентльмены', 'The Gentlemen', 'Один ушлый американец ещё со студенческих лет приторговывал наркотиками, а теперь придумал схему нелегального обогащения с использованием поместий обедневшей английской аристократии и очень неплохо на этом разбогател. Другой пронырливый журналист приходит к Рэю, правой руке американца, и предлагает тому купить киносценарий, в котором подробно описаны преступления его босса при участии других представителей лондонского криминального мира — партнёра-еврея, китайской диаспоры, чернокожих спортсменов и даже русского олигарха', 113, 18, 2019, 8.5, 4),
       (6, 'Одержимость', 'Whiplash', 'Эндрю мечтает стать великим. Казалось бы, вот-вот его мечта осуществится. Юношу замечает настоящий гений, дирижер лучшего в стране оркестра. Желание Эндрю добиться успеха быстро становится одержимостью, а безжалостный наставник продолжает подталкивать его все дальше и дальше – за пределы человеческих возможностей. Кто выйдет победителем из этой схватки?', 106, 16, 2013, 8.3, 5),
       (7, 'Зеленая книга', 'Green Book', '1960-е годы. После закрытия нью-йоркского ночного клуба на ремонт вышибала Тони по прозвищу Болтун ищет подработку на пару месяцев. Как раз в это время Дон Ширли — утонченный светский лев, богатый и талантливый чернокожий музыкант, исполняющий классическую музыку — собирается в турне по южным штатам, где ещё сильны расистские убеждения и царит сегрегация. Он нанимает Тони в качестве водителя, телохранителя и человека, способного решать текущие проблемы. У этих двоих так мало общего, и эта поездка навсегда изменит жизнь обоих.', 130, 16, 2018, 8.4, 6),
       (8, 'Волк с Уолл-стрит', 'The Wolf of Wall Street', '1987 год. Джордан Белфорт становится брокером в успешном инвестиционном банке. Вскоре банк закрывается после внезапного обвала индекса Доу-Джонса. По совету жены Терезы Джордан устраивается в небольшое заведение, занимающееся мелкими акциями. Его настойчивый стиль общения с клиентами и врождённая харизма быстро даёт свои плоды. Он знакомится с соседом по дому Донни, торговцем, который сразу находит общий язык с Джорданом и решает открыть с ним собственную фирму. В качестве сотрудников они нанимают нескольких друзей Белфорта, его отца Макса и называют компанию «Стрэттон Оукмонт». В свободное от работы время Джордан прожигает жизнь: лавирует от одной вечеринки к другой, вступает в сексуальные отношения с проститутками, употребляет множество наркотических препаратов, в том числе кокаин и кваалюд. Однажды наступает момент, когда быстрым обогащением Белфорта начинает интересоваться агент ФБР', 180, 18, 2013, 7.9, 7),
       (9, 'Джанго освобожденный', 'Django Unchained', 'Эксцентричный охотник за головами, также известный как Дантист, промышляет отстрелом самых опасных преступников. Работенка пыльная, и без надежного помощника ему не обойтись. Но как найти такого и желательно не очень дорогого? Освобождённый им раб по имени Джанго – прекрасная кандидатура. Правда, у нового помощника свои мотивы – кое с чем надо сперва разобраться.', 165, 18, 2012, 8.2, 8),
       (10, 'Хоббит: Нежданное путешествие', 'The Hobbit: An Unexpected Journey', 'Хоббит Бильбо Бэггинс пускается в грандиозный поход, целью которого является отвоевание утраченного королевства гномов Эребор у дракона Смауга. Совершенно неожиданно с хоббитом налаживает контакт волшебник Гэндальф Серый. Так Бильбо находит себя и присоединяется к компании тринадцати гномов, возглавляемых легендарным воином Торином Дубощитом. Их путешествие пройдёт через Дикий Край, предательские земли, населенные гоблинами и орками, смертоносными варгами, гигантскими пауками, меняющим шкуры народом и волшебниками.', 169, 6, 2012, 8.1, 9),
       (11, 'Омерзительная восьмерка', 'The Hateful Eight', 'США после Гражданской войны. Легендарный охотник за головами Джон Рут по кличке Вешатель конвоирует заключенную. По пути к ним прибиваются еще несколько путешественников. Снежная буря вынуждает компанию искать укрытие в лавке на отшибе, где уже расположилось весьма пестрое общество: генерал конфедератов, мексиканец, ковбой… И один из них - не тот, за кого себя выдает.', 187, 18, 2015, 7.9, 8),
       (12, 'Головоломка', 'Inside Out', 'Райли — обычная 11-летняя школьница, и, как у каждого из нас, ее поведение определяют пять базовых эмоций: Радость, Печаль, Страх, Гнев и Брезгливость. Эмоции живут в сознании девочки и каждый день помогают ей справляться с проблемами, руководя всеми ее поступками. До поры до времени эмоции живут дружно, но вдруг оказывается, что Райли и ее родителям предстоит переезд из небольшого уютного городка в шумный и людный мегаполис. Каждая из эмоций считает, что именно она лучше прочих знает, что нужно делать в этой непростой ситуации, и в голове у девочки наступает полная неразбериха. Чтобы наладить жизнь в большом городе, освоиться в новой школе и подружиться с одноклассниками, эмоциям Райли предстоит снова научиться работать сообща.', 95, 6, 2015, 8.0, 10),
       (13, 'Гарри Поттер и Дары Смерти: Часть II', 'Harry Potter and the Deathly Hallows: Part 2', 'В грандиозной последней главе битва между добрыми и злыми силами мира волшебников перерастает во всеобщую войну. Ставки ещё никогда не были так высоки, а поиск убежища – столь сложен. И быть может именно Гарри Поттеру придется пожертвовать всем в финальном сражении с Волан-де-Мортом. Способен ли наш герой спасти мир? И всё закончится здесь.', 130, 12, 2011, 8.1, 11),
       (14, 'Зверополис', 'Zootopia', 'Добро пожаловать в Зверополис – современный город, населенный самыми разными животными, от огромных слонов до крошечных мышек. Зверополис разделен на районы, полностью повторяющие естественную среду обитания разных жителей – здесь есть и элитный район Площадь Сахары и неприветливый Тундратаун. В этом городе появляется новый офицер полиции, жизнерадостная зайчиха Джуди Хоппс, которая с первых дней работы понимает, как сложно быть маленькой и пушистой среди больших и сильных полицейских. Джуди хватается за первую же возможность проявить себя, несмотря на то, что ее партнером будет болтливый хитрый лис Ник Уайлд. Вдвоем им предстоит раскрыть сложное дело, от которого будет зависеть судьба всех обитателей Зверополиса.', 108, 6, 2016, 8.3, 12),
       (15, 'По соображениям совести', 'Hacksaw Ridge', 'Медик американской армии времён Второй мировой войны Дезмонд Досс, который служил во время битвы за Окинаву, отказывается убивать людей и становится первым идейным уклонистом в американской истории, удостоенным Медали Почёта.', 139, 18, 2016, 8.0, 13),
       (16, 'Ford против Ferrari', 'Ford v Ferrari', 'В начале 1960-х Генри Форд II принимает решение улучшить имидж компании и сменить курс на производство более модных автомобилей. После неудавшейся попытки купить практически банкрота Ferrari американцы решают бросить вызов итальянским конкурентам на трассе и выиграть престижную гонку 24 часа Ле-Мана. Чтобы создать подходящую машину, компания нанимает автоконструктора Кэррола Шэлби, а тот отказывается работать без выдающегося, но, как считается, трудного в общении гонщика Кена Майлза. Вместе они принимаются за разработку впоследствии знаменитого спорткара Ford GT40.', 152, 16, 2019, 8.2, 14),
       (17, 'Мстители: Война бесконечности', 'Avengers: Infinity War', 'Пока Мстители и их союзники продолжают защищать мир от различных опасностей, с которыми не смог бы справиться один супергерой, новая угроза возникает из космоса: Танос. Межгалактический тиран преследует цель собрать все шесть Камней Бесконечности - артефакты невероятной силы, с помощью которых можно менять реальность по своему желанию. Всё, с чем Мстители сталкивались ранее, вело к этому моменту – судьба Земли никогда ещё не была столь неопределённой.', 149, 16, 2018, 7.9, 15),
       (18, 'Песнь моря', 'Song of the Sea', 'Невероятная история Бена и его сестренки Сирши. Вместе они пускаются в фантастическое путешествие сквозь исчезающий мир магии и древних легенд.', 93, 6, 2014, 8.1, 16),
       (19, 'Хоббит: Пустошь Смауга', 'The Hobbit: The Desolation of Smaug', 'Продолжение путешествия хоббита Бильбо Бэггинса, волшебника Гэндальфа и 13 отважных гномов. Их компания должна добраться до Одинокой горы. А там они встретятся с величайшей опасностью из всех — созданием куда более ужасающим, чем все их прошлые противники, чудовищем, которое проверит на прочность не только их мужество, но крепость их дружбы и правильность выбранного пути, — драконом Смаугом.', 161, 12, 2013, 8.0, 9),
       (20, 'Король говорит!', 'The King\'s Speech', 'Сюжет ленты расскажет о герцоге, который готовится вступить в должность британского короля Георга VI, отца нынешней королевы Елизаветы II. После того, как его брат отрекается от престола, герой неохотно соглашается на трон. Измученный страшным нервным заиканием и сомнениями в своих способностях руководить страной, Георг обращается за помощью к неортодоксальному логопеду по имени Лайонел Лог.', 118, 16, 2010, 8.0, 17),
       (21, 'Стражи Галактики', 'Guardians of the Galaxy', 'Отважному путешественнику Питеру Квиллу попадает в руки таинственный артефакт, принадлежащий могущественному и безжалостному злодею Ронану, строящему коварные планы по захвату Вселенной. Питер оказывается в центре межгалактической охоты, где жертва — он сам. Единственный способ спасти свою жизнь — объединиться с четверкой нелюдимых изгоев: воинственным енотом по кличке Ракета, человекоподобным деревом Грутом, смертельно опасной Гаморой и одержимым жаждой мести Драксом, также известным как Разрушитель. Когда Квилл понимает, какой силой обладает украденный артефакт и какую опасность он представляет для вселенной, одиночка пойдет на все, чтобы сплотить случайных союзников для решающей битвы за судьбу галактики.', 121, 12, 2014, 7.8, 18),
       (22, 'Человек-паук: Через вселенные', 'Spider-Man: Into the Spider-Verse', 'Мы всё знаем о Питере Паркере. Он спас город, влюбился, а потом спасал город снова и снова… Но все это – в нашем измерении. А что если в результате работы гигантского коллайдера откроется окно из одного измерения в другое? Найдется ли в нем свой Человек-паук? И как он будет выглядеть? Приготовьтесь к тому, что в разных вселенных могут быть разные Люди-пауки и однажды им придется собраться вместе для борьбы с почти непобедимым врагом.', 117, 6, 2018, 8.0, 19),
       (23, 'Хоббит: Битва пяти воинств', 'The Hobbit: The Battle of the Five Armies', 'Когда отряд из тринадцати гномов нанимал хоббита Бильбо Бэгинса в качестве взломщика и четырнадцатого, «счастливого», участника похода к Одинокой горе, Бильбо полагал, что его приключения закончатся, когда он выполнит свою задачу - найдет сокровище, которое так необходимо предводителю гномов Торину. Путешествие в Эребор, захваченное драконом Смаугом королевство гномов, оказалось еще более опасным, чем предполагали гномы и даже Гэндальф - мудрый волшебник, протянувший Торину и его отряду руку помощи.', 144, 12, 2014, 7.8, 9),
       (24, 'Далласский клуб покупателей', 'Dallas Buyers Club', 'Реальная история Рона Вудруфа, техасского электрика, у которого в 1985 году обнаружили СПИД. Врачи отвели ему всего 30 дней, но он не пожелал смириться со смертным приговором и сумел продлить свою жизнь, принимая нетрадиционные лекарства, а затем наладил подпольный бизнес по продаже их другим больным.', 118, 18, 2013, 7.9, 20),
       (25, 'Прислуга', 'The Help', 'Американский Юг, на дворе 1960-е годы. Скитер только-только закончила университет и возвращается домой, в сонный городок Джексон, где никогда ничего не происходит. Она мечтает стать писательницей, вырваться в большой мир. Но для приличной девушки с Юга не пристало тешиться столь глупыми иллюзиями, приличной девушке следует выйти замуж и хлопотать по дому. Мудрая Эйбилин на тридцать лет старше Скитер, она прислуживает в домах белых всю свою жизнь, вынянчила семнадцать детей и давно уже ничего не ждет от жизни, ибо сердце ее разбито после смерти единственного сына.', 146, 12, 2011, 8.2, 21),
       (26, 'Вторая жизнь Уве', 'En man som heter Ove', 'Уве - пожилой въедливый ворчун, достающий соседей вечными придирками. Он впадает в ярость при виде брошенного не туда мусора или неправильно припаркованной машины. И кроет на чем свет стоит легкомысленную семейку новосёлов, в которой папаша и гвоздя вбить не способен. Зато Уве умеет всё. В доме и в гараже у него всегда идеальный порядок. Как и в мыслях. Вот только жизнь давно перестала иметь для него смысл.', 116, 16, 2015, 8.0, 22),
       (27, 'Достать ножи', 'Knives Out', 'На следующее утро после празднования 85-летия известного автора криминальных романов Харлана Тромби виновника торжества находят мёртвым. Налицо — явное самоубийство, но полиция по протоколу опрашивает всех присутствующих в особняке членов семьи, хотя, в этом деле больше заинтересован частный детектив Бенуа Блан. Тем же утром он получил конверт с наличными от неизвестного и заказ на расследование смерти Харлана. Не нужно быть опытным следователем, чтобы понять, что все приукрашивают свои отношения с почившим главой семейства, но Блану достаётся настоящий подарок — медсестра покойного, которая физически не выносит ложь.', 130, 16, 2019, 8.0, 23),
       (28, 'Дело храбрых', 'Only the Brave', 'История о команде пожарных под названием Granite Mountain Hotshots, столкнувшихся в Аризоне с одним из самых смертоносных пожаров в истории.', 134, 16, 2017, 8.0, 24),
       (29, 'Судья', 'The Judge', 'Успешный адвокат приезжает в родной город на похороны матери и узнаёт, что его отца, городского судью, подозревают в убийстве. Мужчина решает задержаться, чтобы выяснить правду, и постепенно лучше узнаёт родственников, с которыми давно не общался.', 142, 18, 2014, 7.9, 25),
       (30, 'Исчезнувшая', 'Gone Girl', 'Всё было готово для празднования пятилетия супружеской жизни, когда вдруг необъяснимо пропала виновница торжества. Остались следы борьбы в доме, кровь, которую явно пытались стереть, и цепочка подсказок в игре «охота за сокровищами» - жена ежегодно устраивала её для своего обожаемого мужа. И похоже, что эти подсказки дают шанс пролить свет на судьбу исчезнувшей.', 149, 16, 2014, 8.0, 26);

INSERT INTO movie_actor (MOVIE_ID, ACTOR_ID)
VALUES (1, 1), (1, 2), (1, 3),
       (2, 4), (2, 5), (2, 6),
       (3, 7), (3, 8), (3, 9), (3, 10),
       (4, 11), (4, 12),
       (5, 1), (5, 13), (5, 14),
       (6, 15), (6, 16),
       (7, 17), (7, 18),
       (8, 7), (8, 19), (8, 20),
       (9, 21), (9, 22), (9, 7),
       (10, 23), (10, 24), (10, 25),
       (11, 26), (11, 27), (11, 28),
       (12, 29), (12, 30),
       (13, 31), (13, 32), (13, 33),
       (14, 34), (14, 35),
       (15, 36), (15, 37),
       (16, 38), (16, 39),
       (17, 40), (17, 41), (17, 42),
       (18, 43), (18, 44),
       (19, 23), (19, 24), (19, 25),
       (20, 45), (20, 46),
       (21, 47), (21, 48), (21, 49), (21, 50),
       (22, 51), (22, 52),
       (23, 23), (23, 24), (23, 25),
       (24, 1), (24, 53),
       (25, 54), (25, 55),
       (26, 56), (26, 57),
       (27, 58), (27, 59), (27, 60),
       (28, 61), (28, 62),
       (29, 40), (29, 63),
       (30, 64), (30, 65), (30, 66);

INSERT INTO genre (ID, CODE, NAME)
VALUES (1, 'sci-fi', 'Фантастика'),
       (2, 'drama', 'Драма'),
       (3, 'adventure', 'Приключения'),
       (4, 'animation', 'Мультфильм'),
       (5, 'fantasy', 'Фэнтези'),
       (6, 'family', 'Семейный'),
       (7, 'action', 'Боевик'),
       (8, 'thriller', 'Триллер'),
       (9, 'comedy', 'Комедия'),
       (10, 'music', 'Музыка'),
       (11, 'biography', 'Биография'),
       (12, 'western', 'Вестерн'),
       (13, 'war', 'Военный'),
       (14, 'sport', 'Спорт'),
       (15, 'history', 'История');

INSERT INTO movie_genre(MOVIE_ID, GENRE_ID)
VALUES (1, 1), (1, 2), (1, 3),
       (2, 4), (2, 5), (2, 3), (2, 6), (2, 10),
       (3, 1), (3, 7), (3, 2),
       (4, 2), (4, 9),
       (5, 9), (5, 7),
       (6, 2), (6, 10),
       (7, 9), (7, 2),
       (8, 2), (8, 11), (8, 9),
       (9, 12), (9, 7), (9, 2), (9, 9),
       (10, 5), (10, 3), (10, 7),
       (11, 12), (11, 8), (11, 2),
       (12, 4), (12, 6), (12, 9),
       (13, 5), (13, 2), (13, 3),
       (14, 4), (14, 9), (14, 6),
       (15, 2), (15, 13), (15, 11),
       (16, 11), (16, 14), (16, 2),
       (17, 1), (17, 7), (17, 3),
       (18, 4), (18, 2), (18, 3), (18, 6),
       (19, 5), (19, 3),
       (20, 2), (20, 11), (20, 15),
       (21, 1), (21, 7), (21, 3),
       (22, 4), (22, 1), (22, 7),
       (23, 5), (23, 3),
       (24, 2), (24, 11),
       (25, 2),
       (26, 2), (26, 9),
       (27, 9), (27, 2),
       (28, 7), (28, 2), (28, 11),
       (29, 2),
       (30, 8), (30, 2);

INSERT INTO movie_index(ID, MOVIE) SELECT movie.ID, CONCAT(TITLE, RELEASE_DATE, d.NAME,
	(SELECT GROUP_CONCAT(a.NAME) FROM movie m
	inner join movie_actor ma on m.ID = ma.MOVIE_ID
	inner join actor a on ma.ACTOR_ID = a.ID
	WHERE movie.ID = m.ID GROUP BY m.ID),
	DESCRIPTION, ORIGINAL_TITLE) content
FROM movie
inner join director d on d.ID = movie.DIRECTOR_ID;
