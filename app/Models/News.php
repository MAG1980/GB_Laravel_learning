<?php

namespace App\Models;

class News
{
    private array $news = [

        1 => [
            'id' => '1',
            'title' => '59-летняя Деми Мур снялась в куртке на голое тело и восхитила фанатов',
            'text' => '59-летняя знаменитость снялась в зеркало ванной комнаты в оранжевой расстегнутой куртке на голое тело, представленной в ассортименте бренда Glenda Bailey. На размещенных изображениях видно, что волосы телезвезды распущены и спрятаны под капюшоном верхней одежды, а на ее лице полностью отсутствует макияж.
                        «Живу в своей новой куртке», — подписала экс-манекенщица публикацию, которая набрала более 52 тысяч лайков. Поклонники восхитились внешним видом Мур в комментариях под постом. «Красотка», «Прекрасная женщина», «Выглядишь шикарно», «Самая красивая», «Лучшая реклама», — высказывались подписчики.',
            'category_id' => '5',
            'isPrivate'=> true
        ],
        2 => [
            'id' => '2',
            'title' => 'Макрон обвинил власти России в использовании церкви для оправдания политики',
            'text' => 'ТМакрон заявил, что власти РФ используют руководство РПЦ для оправдания политики страны
                        Президент Франции Эммануэль Макрон обвинил власти России в том, что они используют руководство Русской православной церкви (РПЦ) для оправдания политики страны. Его слова приводит РИА Новости.',
            'category_id' => '1',
            'isPrivate'=> false
        ],
        3 => [
            'id' => '3',
            'title' => 'В Минфине спрогнозировали курс рубля',
            'text' => 'Силуанов отметил, что сейчас рынок лишается «токсичных» долларов и евро из-за санкций, введенных против России. Ограничения делают рубль сильнее, однако его укрепление не станет длительным благодаря избавлению от доллара, опроверг он.',
            'category_id' => '4',
            'isPrivate'=> true
        ],
        4 => [
            'id' => '4',
            'title' => 'Борис Джонсон отказался выдвигать кандидатуру на пост премьера Великобритании',
            'text' => 'Бывший премьер Великобритании Борис Джонсон не будет участвовать в выборах лидера Консервативной партии и нового главы правительства. Он не смог заручиться поддержкой 100 депутатов-тори.',
            'category_id' => '1',
            'isPrivate'=> false
        ],
        5 => [
            'id' => '5',
            'title' => 'Российская экономика стабилизировалась после санкционного удара',
            'text' => 'Российская экономика стабилизировалась во втором квартале 2022 года после санкционного удара, говорится в региональном докладе Международного валютного фонда (МВФ). Содержание доклада приводит РИА Новости',
            'category_id' => '4',
            'isPrivate'=> true
        ],
        6 => [
            'id' => '6',
            'title' => 'Рамзан Кадыров отреагировал на скандальное решение судей в бою Петра Яна',
            'text' => 'МОСКВА, 23 окт — РИА Новости. Глава Чечни Рамзан Кадыров считает россиянина Петра Яна лучшим бойцом в легчайшем весе UFC, несмотря на скандальное поражение от американца Шона О’Мэлли на 280-м номерном турнире.',
            'category_id' => '2',
            'isPrivate'=> true
        ],
        7 => [
            'id' => '7',
            'title' => 'Шольц и фон дер Ляйен призвали разработать «план Маршалла» для Украины',
            'text' => 'БЕРЛИН, 23 октября. /ТАСС/. Канцлер Германии Олаф Шольц и председатель Еврокомиссии (ЕК) Урсула фон дер Ляйен призвали разработать «план Маршалла» для Украины и создать платформу для координации оказываемой Киеву помощи в восстановлении страны. Об этом они заявили в совместной статье, опубликованной в воскресенье на сайте газеты Frankfurter Allgemeine Zeitung в преддверии запланированной на 25 октября в Берлине экспертной конференции по вопросам восстановления бывшей советской республики.',
            'category_id' => '1',
            'isPrivate'=> false
        ],
        8 => [
            'id' => '8',
            'title' => 'Чехия обратится в арбитражный суд из-за срыва поставок российского газа',
            'text' => 'Чешская национальная энергетическая компания «ЧЭЗ» (ČEZ) намерена обратиться в международный арбитражный суд из-за «миллиардных» убытков в связи с перебоями в поставках газа из России, заявил председатель правления и генеральный директор компании Даниэл Бенеш.',
            'category_id' => '4',
            'isPrivate'=> false
        ],
        9 => [
            'id' => '9',
            'title' => 'Мэрия спрогнозировала рост средней зарплаты в Воронеже до 71 тыс рублей',
            'text' => 'Согласно прогнозу социально-экономического развития Воронежа, в 2023 году среднемесячная зарплата работников организаций может вырасти до 60,5 тыс. рублей, в 2024-м — до 65,9 тыс. рублей, а в 2025-м — до 71,7 тыс. рублей. Прогноз опубликовали на сайте городской администрации в пятницу, 21 октября.',
            'category_id' => '4',
            'isPrivate'=> true
        ],
        10 => [
            'id' => '10',
            'title' => 'Россияне забрали в сентябре со вкладов почти 500 млрд рублей',
            'text' => 'Средства населения снизились в банках по итогам сентября на 458 млрд руб. (-1,4%) до 33,14 трлн руб. (без учета эскроу), говорится в новом обзоре ЦБ о развитии банковского сектора. Отток пришелся на вторую половину месяца, когда увеличилось количество уехавших из страны людей, которые брали с собой наличные деньги, говорится в обзоре ЦБ. Кроме того, поясняет регулятор, граждане склонны снимать наличные в ситуации стресса или неопределенности, как это было весной, но потом обычно возвращают деньги в банки.',
            'category_id' => '4',
            'isPrivate'=> false
        ],
        11 => [
            'id' => '11',
            'title' => '«Спартак» уничтожил соперника даже без Промеса. Но как же обидно за Соболева',
            'text' => '«Спартак» снова победил. Матч с «Химками» в 14-м туре получился противоречивым, но три очка всё равно достались красно-белым. А ведь всё могло быть иначе.',
            'category_id' => '2',
            'isPrivate'=> true
        ],
        12 => [
            'id' => '12',
            'title' => 'Осимхен принес победу «Наполи» в матче с «Ромой»',
            'text' => 'Завершился матч 11-го тура итальянской Серии А, в котором «Рома» на своём поле принимала «Наполи».',
            'category_id' => '2',
            'isPrivate'=> false
        ],
        13 => [
            'id' => '13',
            'title' => 'Форвард «Колорадо» Ничушкин догнал лидирующего Панарина в гонке бомбардиров НХЛ',
            'text' => 'В Парадайсе (США) на стадионе «Ти-Мобайл Арена» состоялся матч регулярного чемпионата НХЛ, в котором «Вегас Голден Найтс» принимал «Колорадо Эвеланш».',
            'category_id' => '2',
            'isPrivate'=> false
        ],
        14 => [
            'id' => '14',
            'title' => '«План отца не выполнен». Макгрегор обрушился с критикой на Хабиба и удалил пост',
            'text' => 'Бывший чемпион UFC в двух весовых категориях Конор Макгрегор после победы Ислама Махачева в титульном поединке над Чарльзом Оливейрой обратился в социальных сетях к Хабибу Нурмагомедову.',
            'category_id' => '2',
            'isPrivate'=> true
        ],
        15 => [
            'id' => '15',
            'title' => 'Где сейчас герои боевиков 1990-х: Ван Дамм, Лундгрен, Сигал и другие',
            'text' => 'Кто из актеров завершил карьеру, а кто продолжает появляться на экране? О том, как сложилась судьба главных звезд остросюжетных фильмов 1990-х, рассказывает РБК Life',
            'category_id' => '3',
            'isPrivate'=> false
        ],
        16 => [
            'id' => '16',
            'title' => 'Критики разгромили вышедший в прокат фильм с Дуэйном Джонсоном',
            'text' => 'Эксперты подчеркнули, что актерского обаяния «Скалы» не хватило, чтобы спасти картину. Новый супергеройский фильм DC «Черный Адам», главную роль в котором исполнил Дуэйн Джонсон, получил разгромную реакцию от критиков.',
            'category_id' => '3',
            'isPrivate'=> true
        ],
        17 => [
            'id' => '17',
            'title' => 'Netflix снимет сериал по мотивам романа «Сто лет одиночества»',
            'text' => 'Стриминговая платформа Netflix сообщила о создании сериала по мотивам романа Габриэля Гарсиа Маркеса «Сто лет одиночества». Видео с анонсом вышло на  официальном YouTube-канале сервиса.
                        Сервис объявил о старте производства экранизации. В тизере показали работу команды над декорациями вымышленного города Макондо, где разворачиваются события романа, и костюмами персонажей.',
            'category_id' => '3',
            'isPrivate'=> false
        ],
        18 => [
            'id' => '18',
            'title' => 'Дэниэл Рэдклифф использовал фото Кэмерон Диаз на съемках «Гарри Поттера»',
            'text' => 'Британский актер Том Фелтон рассказал в своих мемуарах о том, как его коллега по фильмам о волшебнике Гарри Поттере Дэниэл Рэдклифф использовал фото кинозвезды Кэмерон Диаз. Его слова передает Independent.
                        По словам Фелтона, Рэдклифф использовал фотографию Диаз во время съемок игры в квиддич. Так, во время полета на метле артистам нужно было правильно направлять свой взгляд, изображая матч. Для этого операторы использовали теннисные мячи, привязанные к шесту, на которые актеры должны были смотреть.',
            'category_id' => '3',
            'isPrivate'=> false
        ],
        19 => [
            'id' => '19',
            'title' => 'Названы российские артисты с самыми высокими гонорарами',
            'text' => 'Певица Полина Гагарина и исполнитель Shaman (Ярослав Дронов) возглавили рейтинг российских артистов с самыми высокими гонорарами. Об этом сообщает «КП» со ссылкой на промоутера Табриза Шахиди.
                        Сообщается, что стоимость выступления музыкантов на частном мероприятии составляет 3,3 миллиона рублей. Второе место в рейтинге заняли рэпер Баста и группа «Руки вверх!», чьи гонорары составляют 3 миллиона.',
            'category_id' => '5',
            'isPrivate'=> true
        ],
        20 => [
            'id' => '20',
            'title' => 'Тяжело перенесший ковид Звягинцев посетил кинофестиваль в Париже',
            'text' => 'В столице Франции прошел трехдневный фестиваль российского кино. Режиссер Андрей Звягинцев, продолжающий восстанавливаться после тяжело перенесенного коронавируса, впервые появился на публике не в инвалидном кресле.
                        Постановщик посетил проходящий в Париже трехдневный фестиваль российского кино. На смотре Звягинцева сопровождал его сын Петр. Фильмом открытия смотра стал «Левиафан». Перед зрителями режиссер ленты появился не в инвалидном кресле, а самостоятельно, опираясь на специальные палки.',
            'category_id' => '3',
            'isPrivate'=> false
        ],
        21 => [
            'id' => '21',
            'title' => 'Первая леди Мексики обвинила Ральфа Лорена в плагиате',
            'text' => 'Жена президента Мексики Андреса Мануэля Лопеса Обрадора — Беатрис Гутьеррес Мюллер — обвинила американского модельера Ральфа Лорена в плагиате.',
            'category_id' => '5',
            'isPrivate'=> false
        ],
        22 => [
            'id' => '22',
            'title' => 'Суд вынес решение по делу Кевина Спейси о домогательствах',
            'text' => 'Харассмент-скандал с участием голливудского актера Кевина Спейси разгорелся в 2017 году. Тогда другой актер Энтони Рэпп публично обвинил звезду в домогательствах.
                        Якобы когда Энтони было 14 лет, то есть 30 лет назад, Спейси приставал к нему в состоянии алкогольного опьянения. «Он пытался соблазнить меня. Я не знаю, правильно ли использовать именно это выражение. Но знал, что он пытался заняться со мной сексом», — заявлял в интервью мужчина.',
            'category_id' => '5',
            'isPrivate'=> false
        ],
        23 => [
            'id' => '23',
            'title' => '6 секретов красоты Катрин Денев, которые актуальны и сегодня',
            'text' => 'Актрису редко можно увидеть без укладки или с растрепанной головой даже вне красной дорожки – ее волосы всегда тщательно и очень аккуратно уложены. Как правило, это мальвинка, ракушка или объемные локоны. К волосам знаменитость всегда относилась с особым трепетом, используя только натуральные средства. Кроме того, в ее сумочке всегда можно найти восстанавливающий спрей (видимо, для экстренных ситуаций).',
            'category_id' => '5',
            'isPrivate'=> true
        ],
        24 => [
            'id' => '24',
            'title' => 'Во Франции раскритиковали главу Еврокомиссии',
            'text' => 'Французский политик Руаяль назвала главу Еврокомиссии фон дер Ляйен пресс-секретарем НАТО
                         Бывший кандидат в президенты Франции на выборах 2007 года Сеголен Руаяль выступила с критикой главы Еврокомисси Урсулы фон дер Ляйен. Об этом она заявила в беседе с израильским телеканалом i24news.',
            'category_id' => '1',
            'isPrivate'=> false
        ],
        25 => [
            'id' => '25',
            'title' => 'Си Цзиньпин переизбран на третий срок',
            'text' => 'Центральный комитет Компартии Китая переизбрал Си Цзиньпина главой КНР на третий срок
                        Центральный комитет Коммунистической партии Китая (ЦК КПК) в воскресенье, 23 октября, переизбрал Си Цзиньпина на пост генерального секретаря на третий срок. Об этом сообщает Центральное телевидение Китая.',
            'category_id' => '1',
            'isPrivate'=> true
        ]
    ];

    public function getNews(): array
    {
        return $this->news;
    }

    public function getOneNews($id): ?array
    {
        if (array_key_exists($id, $this->getNews())) {
            return $this->getNews()[$id];
        }
        return null;
    }

    public function getNewsFilteredByCategory($name): ?array
    {
        $id = Categories::getCategoryIdBy($name);
       $filteredNews = array_filter($this->getNews(), function($news) use($id) {
               return $news['category_id'] === $id;
        });
       return $filteredNews;
    }
}
