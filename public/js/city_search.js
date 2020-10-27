$("#submit_select").change(function(){
    var area = $('#submit_select option:selected').text();
    var $city =$('.city');

    Hokkaido = 
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" id="submit_select" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="愛別町">愛別町</option>'+
            '<option value="赤井川村">赤井川村</option>'+
            '<option value="赤平市">赤平市</option>'+
            '<option value="旭川市">旭川市</option>'+
            '<option value="芦別市">芦別市</option>'+
            '<option value="足寄町">足寄町</option>'+
            '<option value="厚岸町">厚岸町</option>'+
            '<option value="厚沢部町">厚沢部町</option>'+
            '<option value="厚真町">厚真町</option>'+
            '<option value="網走市">網走市</option>'+
            '<option value="安平町">安平町</option>'+
            '<option value="池田町">池田町</option>'+
            '<option value="石狩市">石狩市</option>'+
            '<option value="今金町">今金町</option>'+
            '<option value="岩内町">岩内町</option>'+
            '<option value="岩見沢市">岩見沢市</option>'+
            '<option value="歌志内市">歌志内市</option>'+
            '<option value="浦臼町">浦臼町</option>'+
            '<option value="浦河町">浦河町</option>'+
            '<option value="浦幌町">浦幌町</option>'+
            '<option value="雨竜町">雨竜町</option>'+
            '<option value="枝幸町">枝幸町</option>'+
            '<option value="江差町">江差町</option>'+
            '<option value="恵庭市">恵庭市</option>'+
            '<option value="江別市">江別市</option>'+
            '<option value="えりも町">えりも町</option>'+
            '<option value="遠軽町">遠軽町</option>'+
            '<option value="遠別町">遠別町</option>'+
            '<option value="雄武町">雄武町</option>'+
            '<option value="大空町">大空町</option>'+
            '<option value="奥尻町">奥尻町</option>'+
            '<option value="置戸町">置戸町</option>'+
            '<option value="興部町">興部町</option>'+
            '<option value="長万部町">長万部町</option>'+
            '<option value="小樽市">小樽市</option>'+
            '<option value="音威子府村">音威子府村</option>'+
            '<option value="音更町">音更町</option>'+
            '<option value="乙部町">乙部町</option>'+
            '<option value="帯広市">帯広市</option>'+
            '<option value="小平町">小平町</option>'+
            '<option value="上川町">上川町</option>'+
            '<option value="上士幌町">上士幌町</option>'+
            '<option value="上砂川町">上砂川町</option>'+
            '<option value="上ノ国町">上ノ国町</option>'+
            '<option value="上富良野町">上富良野町</option>'+
            '<option value="神恵内村">神恵内村</option>'+
            '<option value="木古内町">木古内町</option>'+
            '<option value="北広島市">北広島市</option>'+
            '<option value="北見市">北見市</option>'+
            '<option value="喜茂別町">喜茂別町</option>'+
            '<option value="京極町">京極町</option>'+
            '<option value="共和町">共和町</option>'+
            '<option value="清里町">清里町</option>'+
            '<option value="釧路市">釧路市</option>'+
            '<option value="釧路町">釧路町</option>'+
            '<option value="倶知安町">倶知安町</option>'+
            '<option value="栗山町">栗山町</option>'+
            '<option value="黒松内町">黒松内町</option>'+
            '<option value="訓子府町">訓子府町</option>'+
            '<option value="剣淵町">剣淵町</option>'+
            '<option value="小清水町">小清水町</option>'+
            '<option value="札幌市">札幌市</option>'+
            '<option value="様似町">様似町</option>'+
            '<option value="更別村">更別村</option>'+
            '<option value="猿払村">猿払村</option>'+
            '<option value="佐呂間町">佐呂間町</option>'+
            '<option value="鹿追町">鹿追町</option>'+
            '<option value="鹿部町">鹿部町</option>'+
            '<option value="色丹村">色丹村</option>'+
            '<option value="標茶町">標茶町</option>'+
            '<option value="士別市">士別市</option>'+
            '<option value="標津町">標津町</option>'+
            '<option value="蘂取村">蘂取村</option>'+
            '<option value="士幌町">士幌町</option>'+
            '<option value="島牧村">島牧村</option>'+
            '<option value="清水町">清水町</option>'+
            '<option value="占冠村">占冠村</option>'+
            '<option value="下川町">下川町</option>'+
            '<option value="積丹町">積丹町</option>'+
            '<option value="紗那村">紗那村</option>'+
            '<option value="斜里町">斜里町</option>'+
            '<option value="初山別村">初山別村</option>'+
            '<option value="白老町">白老町</option>'+
            '<option value="白糠町">白糠町</option>'+
            '<option value="知内町">知内町</option>'+
            '<option value="新篠津村">新篠津村</option>'+
            '<option value="新得町">新得町</option>'+
            '<option value="新十津川町">新十津川町</option>'+
            '<option value="新ひだか町">新ひだか町</option>'+
            '<option value="寿都町">寿都町</option>'+
            '<option value="砂川市">砂川市</option>'+
            '<option value="せたな町">せたな町</option>'+
            '<option value="壮瞥町">壮瞥町</option>'+
            '<option value="大樹町">大樹町</option>'+
            '<option value="鷹栖町">鷹栖町</option>'+
            '<option value="滝川市">滝川市</option>'+
            '<option value="滝上町">滝上町</option>'+
            '<option value="伊達市">伊達市</option>'+
            '<option value="秩父別町">秩父別町</option>'+
            '<option value="千歳市">千歳市</option>'+
            '<option value="月形町">月形町</option>'+
            '<option value="津別町">津別町</option>'+
            '<option value="鶴居村">鶴居村</option>'+
            '<option value="天塩町">天塩町</option>'+
            '<option value="弟子屈町">弟子屈町</option>'+
            '<option value="当別町">当別町</option>'+
            '<option value="当麻町">当麻町</option>'+
            '<option value="洞爺湖町">洞爺湖町</option>'+
            '<option value="苫小牧市">苫小牧市</option>'+
            '<option value="苫前町">苫前町</option>'+
            '<option value="泊村">泊村</option>'+
            '<option value="豊浦町">豊浦町</option>'+
            '<option value="豊頃町">豊頃町</option>'+
            '<option value="豊富町">豊富町</option>'+
            '<option value="奈井江町">奈井江町</option>'+
            '<option value="中川町">中川町</option>'+
            '<option value="中札内村">中札内村</option>'+
            '<option value="中標津町">中標津町</option>'+
            '<option value="中頓別町">中頓別町</option>'+
            '<option value="長沼町">長沼町</option>'+
            '<option value="中富良野町">中富良野町</option>'+
            '<option value="七飯町">七飯町</option>'+
            '<option value="名寄市">名寄市</option>'+
            '<option value="南幌町">南幌町</option>'+
            '<option value="新冠町">新冠町</option>'+
            '<option value="仁木町">仁木町</option>'+
            '<option value="西興部村">西興部村</option>'+
            '<option value="ニセコ町">ニセコ町</option>'+
            '<option value="沼田町">沼田町</option>'+
            '<option value="根室市">根室市</option>'+
            '<option value="登別市">登別市</option>'+
            '<option value="函館市">函館市</option>'+
            '<option value="羽幌町">羽幌町</option>'+
            '<option value="浜頓別町">浜頓別町</option>'+
            '<option value="浜中町">浜中町</option>'+
            '<option value="美瑛町">美瑛町</option>'+
            '<option value="東神楽町">東神楽町</option>'+
            '<option value="東川町">東川町</option>'+
            '<option value="日高町">日高町</option>'+
            '<option value="比布町">比布町</option>'+
            '<option value="美唄市">美唄市</option>'+
            '<option value="美深町">美深町</option>'+
            '<option value="美幌町">美幌町</option>'+
            '<option value="平取町">平取町</option>'+
            '<option value="広尾町">広尾町</option>'+
            '<option value="深川市">深川市</option>'+
            '<option value="福島町">福島町</option>'+
            '<option value="富良野市">富良野市</option>'+
            '<option value="古平町">古平町</option>'+
            '<option value="別海町">別海町</option>'+
            '<option value="北斗市">北斗市</option>'+
            '<option value="北竜町">北竜町</option>'+
            '<option value="幌加内町">幌加内町</option>'+
            '<option value="幌延町">幌延町</option>'+
            '<option value="本別町">本別町</option>'+
            '<option value="幕別町">幕別町</option>'+
            '<option value="増毛町">増毛町</option>'+
            '<option value="真狩村">真狩村</option>'+
            '<option value="松前町">松前町</option>'+
            '<option value="三笠市">三笠市</option>'+
            '<option value="南富良野町">南富良野町</option>'+
            '<option value="むかわ町">むかわ町</option>'+
            '<option value="室蘭市">室蘭市</option>'+
            '<option value="芽室町">芽室町</option>'+
            '<option value="妹背牛町">妹背牛町</option>'+
            '<option value="森町">森町</option>'+
            '<option value="紋別市">紋別市</option>'+
            '<option value="八雲町">八雲町</option>'+
            '<option value="夕張市">夕張市</option>'+
            '<option value="湧別町">湧別町</option>'+
            '<option value="由仁町">由仁町</option>'+
            '<option value="余市町">余市町</option>'+
            '<option value="羅臼町">羅臼町</option>'+
            '<option value="蘭越町">蘭越町</option>'+
            '<option value="陸別町">陸別町</option>'+
            '<option value="利尻町">利尻町</option>'+
            '<option value="利尻富士町">利尻富士町</option>'+
            '<option value="留寿都村">留寿都村</option>'+
            '<option value="留別村">留別村</option>'+
            '<option value="留萌市">留萌市</option>'+
            '<option value="留夜別村">留夜別村</option>'+
            '<option value="礼文町">礼文町</option>'+
            '<option value="稚内市">稚内市</option>'+
            '<option value="和寒町">和寒町</option>'+
        '</select>'+
    '</form>';

    Aomori =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" id="submit_select" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="青森市">青森市</option>'+
            '<option value="鰺ヶ沢町">鰺ヶ沢町</option>'+
            '<option value="板柳町">板柳町</option>'+
            '<option value="田舎館村">田舎館村</option>'+
            '<option value="今別町">今別町</option>'+
            '<option value="おいらせ町">おいらせ町</option>'+
            '<option value="大間町">大間町</option>'+
            '<option value="大鰐町">大鰐町</option>'+
            '<option value="風間浦村">風間浦村</option>'+
            '<option value="黒石市">黒石市</option>'+
            '<option value="五所川原市">五所川原市</option>'+
            '<option value="五戸町">五戸町</option>'+
            '<option value="佐井村">佐井村</option>'+
            '<option value="三戸町">三戸町</option>'+
            '<option value="七戸町">七戸町</option>'+
            '<option value="新郷村">新郷村</option>'+
            '<option value="外ヶ浜町">外ヶ浜町</option>'+
            '<option value="田子町">田子町</option>'+
            '<option value="つがる市">つがる市</option>'+
            '<option value="鶴田町">鶴田町</option>'+
            '<option value="東北町">東北町</option>'+
            '<option value="十和田市">十和田市</option>'+
            '<option value="中泊町">中泊町</option>'+
            '<option value="南部町">南部町</option>'+
            '<option value="西目屋村">西目屋村</option>'+
            '<option value="野辺地町">野辺地町</option>'+
            '<option value="階上町">階上町</option>'+
            '<option value="八戸市">八戸市</option>'+
            '<option value="東通村">東通村</option>'+
            '<option value="平川市">平川市</option>'+
            '<option value="平内町">平内町</option>'+
            '<option value="弘前市">弘前市</option>'+
            '<option value="深浦町">深浦町</option>'+
            '<option value="藤崎町">藤崎町</option>'+
            '<option value="三沢市">三沢市</option>'+
            '<option value="むつ市">むつ市</option>'+
            '<option value="横浜町">横浜町</option>'+
            '<option value="蓬田村">蓬田村</option>'+
            '<option value="六戸町">六戸町</option>'+
            '<option value="六ヶ所村">六ヶ所村</option>'+
        '</select>'+
    '</form>';

    Iwate =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" id="submit_select" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="一関市">一関市</option>'+
            '<option value="一戸町">一戸町</option>'+
            '<option value="岩泉町">岩泉町</option>'+
            '<option value="岩手町">岩手町</option>'+
            '<option value="奥州市">奥州市</option>'+
            '<option value="大槌町">大槌町</option>'+
            '<option value="大船渡市">大船渡市</option>'+
            '<option value="金ケ崎町">金ケ崎町</option>'+
            '<option value="釜石市">釜石市</option>'+
            '<option value="軽米町">軽米町</option>'+
            '<option value="北上市">北上市</option>'+
            '<option value="久慈市">久慈市</option>'+
            '<option value="葛巻町">葛巻町</option>'+
            '<option value="九戸村">九戸村</option>'+
            '<option value="雫石町">雫石町</option>'+
            '<option value="紫波町">紫波町</option>'+
            '<option value="住田町">住田町</option>'+
            '<option value="滝沢市">滝沢市</option>'+
            '<option value="田野畑村">田野畑村</option>'+
            '<option value="遠野市">遠野市</option>'+
            '<option value="西和賀町">西和賀町</option>'+
            '<option value="二戸市">二戸市</option>'+
            '<option value="野田村">野田村</option>'+
            '<option value="八幡平市">八幡平市</option>'+
            '<option value="花巻市">花巻市</option>'+
            '<option value="平泉町">平泉町</option>'+
            '<option value="洋野町">洋野町</option>'+
            '<option value="普代村">普代村</option>'+
            '<option value="宮古市">宮古市</option>'+
            '<option value="盛岡市">盛岡市</option>'+
            '<option value="矢巾町">矢巾町</option>'+
            '<option value="山田町">山田町</option>'+
            '<option value="陸前高田市">陸前高田市</option>'+
        '</select>'+
    '</form>';

    Miyagi=
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" id="submit_select" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="石巻市">石巻市</option>'+
            '<option value="岩沼市">岩沼市</option>'+
            '<option value="大河原町">大河原町</option>'+
            '<option value="大崎市">大崎市</option>'+
            '<option value="大郷町">大郷町</option>'+
            '<option value="大衡村">大衡村</option>'+
            '<option value="女川町">女川町</option>'+
            '<option value="角田市">角田市</option>'+
            '<option value="加美町">加美町</option>'+
            '<option value="川崎町">川崎町 (宮城県)</option>'+
            '<option value="栗原市">栗原市</option>'+
            '<option value="気仙沼市">気仙沼市</option>'+
            '<option value="蔵王町">蔵王町</option>'+
            '<option value="塩竈市">塩竈市</option>'+
            '<option value="色麻町">色麻町</option>'+
            '<option value="七ヶ宿町">七ヶ宿町</option>'+
            '<option value="七ヶ浜町">七ヶ浜町</option>'+
            '<option value="柴田町">柴田町</option>'+
            '<option value="白石市">白石市</option>'+
            '<option value="仙台市">仙台市</option>'+
            '<option value="大和町">大和町</option>'+
            '<option value="多賀城市">多賀城市</option>'+
            '<option value="富谷市">富谷市</option>'+
            '<option value="登米市">登米市</option>'+
            '<option value="名取市">名取市</option>'+
            '<option value="東松島市">東松島市</option>'+
            '<option value="松島町">松島町</option>'+
            '<option value="丸森町">丸森町</option>'+
            '<option value="美里町">美里町</option>'+
            '<option value="南三陸町">南三陸町</option>'+
            '<option value="村田町">村田町</option>'+
            '<option value="山元町">山元町</option>'+
            '<option value="利府町">利府町</option>'+
            '<option value="涌谷町">涌谷町</option>'+
            '<option value="亘理町">亘理町</option>'+
        '</select>'+
    '</form>';

    Akita =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="秋田市">秋田市</option>'+
            '<option value="井川町">井川町</option>'+
            '<option value="羽後町">羽後町</option>'+
            '<option value="大潟村">大潟村</option>'+
            '<option value="大館市">大館市</option>'+
            '<option value="男鹿市">男鹿市</option>'+
            '<option value="潟上市">潟上市</option>'+
            '<option value="鹿角市">鹿角市</option>'+
            '<option value="上小阿仁村">上小阿仁村</option>'+
            '<option value="北秋田市">北秋田市</option>'+
            '<option value="小坂町">小坂町</option>'+
            '<option value="五城目町">五城目町</option>'+
            '<option value="仙北市">仙北市</option>'+
            '<option value="大仙市">大仙市</option>'+
            '<option value="にかほ市">にかほ市</option>'+
            '<option value="能代市">能代市</option>'+
            '<option value="八郎潟町">八郎潟町</option>'+
            '<option value="八峰町">八峰町</option>'+
            '<option value="東成瀬村">東成瀬村</option>'+
            '<option value="藤里町">藤里町</option>'+
            '<option value="美郷町">美郷町</option>'+
            '<option value="三種町">三種町</option>'+
            '<option value="湯沢市">湯沢市</option>'+
            '<option value="由利本荘市">由利本荘市</option>'+
            '<option value="横手市">横手市</option>'+
        '</select>'+
    '</form>';

    Yamagata =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="朝日町">朝日町</option>'+
            '<option value="飯豊町">飯豊町</option>'+
            '<option value="大石田町">大石田町</option>'+
            '<option value="大江町">大江町</option>'+
            '<option value="大蔵村">大蔵村</option>'+
            '<option value="小国町">小国町</option>'+
            '<option value="尾花沢市">尾花沢市</option>'+
            '<option value="金山町">金山町</option>'+
            '<option value="河北町">河北町</option>'+
            '<option value="上山市">上山市</option>'+
            '<option value="川西町">川西町</option>'+
            '<option value="寒河江市">寒河江市</option>'+
            '<option value="酒田市">酒田市</option>'+
            '<option value="鮭川村">鮭川村</option>'+
            '<option value="庄内町">庄内町</option>'+
            '<option value="白鷹町">白鷹町</option>'+
            '<option value="新庄市">新庄市</option>'+
            '<option value="高畠町">高畠町</option>'+
            '<option value="鶴岡市">鶴岡市</option>'+
            '<option value="天童市">天童市</option>'+
            '<option value="戸沢村">戸沢村</option>'+
            '<option value="長井市">長井市</option>'+
            '<option value="中山町">中山町</option>'+
            '<option value="南陽市">南陽市</option>'+
            '<option value="西川町">西川町</option>'+
            '<option value="東根市">東根市</option>'+
            '<option value="舟形町">舟形町</option>'+
            '<option value="真室川町">真室川町</option>'+
            '<option value="三川町">三川町</option>'+
            '<option value="村山市">村山市</option>'+
            '<option value="最上町">最上町</option>'+
            '<option value="山形市">山形市</option>'+
            '<option value="山辺町">山辺町</option>'+
            '<option value="遊佐町">遊佐町</option>'+
            '<option value="米沢市">米沢市</option>'+
        '</select>'+
    '</form>';

    Fukushima =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="会津坂下町">会津坂下町</option>'+
            '<option value="会津美里町">会津美里町</option>'+
            '<option value="会津若松市">会津若松市</option>'+
            '<option value="浅川町">浅川町</option>'+
            '<option value="飯舘村">飯舘村</option>'+
            '<option value="石川町">石川町</option>'+
            '<option value="泉崎村">泉崎村</option>'+
            '<option value="猪苗代町">猪苗代町</option>'+
            '<option value="いわき市">いわき市</option>'+
            '<option value="大熊町">大熊町</option>'+
            '<option value="大玉村">大玉村</option>'+
            '<option value="小野町">小野町</option>'+
            '<option value="鏡石町">鏡石町</option>'+
            '<option value="葛尾村">葛尾村</option>'+
            '<option value="金山町">金山町</option>'+
            '<option value="川内村">川内村</option>'+
            '<option value="川俣町">川俣町</option>'+
            '<option value="喜多方市">喜多方市</option>'+
            '<option value="北塩原村">北塩原村</option>'+
            '<option value="国見町">国見町</option>'+
            '<option value="桑折町">桑折町</option>'+
            '<option value="郡山市">郡山市</option>'+
            '<option value="鮫川村">鮫川村</option>'+
            '<option value="下郷町">下郷町</option>'+
            '<option value="昭和村">昭和村</option>'+
            '<option value="白河市">白河市</option>'+
            '<option value="新地町">新地町</option>'+
            '<option value="須賀川市">須賀川市</option>'+
            '<option value="相馬市">相馬市</option>'+
            '<option value="只見町">只見町</option>'+
            '<option value="伊達市">伊達市</option>'+
            '<option value="棚倉町">棚倉町</option>'+
            '<option value="玉川村">玉川村</option>'+
            '<option value="田村市">田村市</option>'+
            '<option value="天栄村">天栄村</option>'+
            '<option value="富岡町">富岡町</option>'+
            '<option value="中島村">中島村</option>'+
            '<option value="浪江町">浪江町</option>'+
            '<option value="楢葉町">楢葉町</option>'+
            '<option value="西会津町">西会津町</option>'+
            '<option value="西郷村">西郷村</option>'+
            '<option value="二本松市">二本松市</option>'+
            '<option value="塙町">塙町</option>'+
            '<option value="磐梯町">磐梯町</option>'+
            '<option value="檜枝岐村">檜枝岐村</option>'+
            '<option value="平田村">平田村</option>'+
            '<option value="広野町">広野町</option>'+
            '<option value="福島市">福島市</option>'+
            '<option value="双葉町">双葉町</option>'+
            '<option value="古殿町">古殿町</option>'+
            '<option value="三島町">三島町</option>'+
            '<option value="南会津町">南会津町</option>'+
            '<option value="南相馬市">南相馬市</option>'+
            '<option value="三春町">三春町</option>'+
            '<option value="本宮市">本宮市</option>'+
            '<option value="柳津町">柳津町</option>'+
            '<option value="矢吹町">矢吹町</option>'+
            '<option value="矢祭町">矢祭町</option>'+
            '<option value="湯川村">湯川村</option>'+
        '</select>'+
    '</form>';

    Ibaraki =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="阿見町">阿見町</option>'+
            '<option value="石岡市">石岡市</option>'+
            '<option value="潮来市">潮来市</option>'+
            '<option value="稲敷市">稲敷市</option>'+
            '<option value="茨城町">茨城町</option>'+
            '<option value="牛久市">牛久市</option>'+
            '<option value="大洗町">大洗町</option>'+
            '<option value="小美玉市">小美玉市</option>'+
            '<option value="笠間市">笠間市</option>'+
            '<option value="鹿嶋市">鹿嶋市</option>'+
            '<option value="かすみがうら市">かすみがうら市</option>'+
            '<option value="神栖市">神栖市</option>'+
            '<option value="河内町">河内町</option>'+
            '<option value="北茨城市">北茨城市</option>'+
            '<option value="古河市">古河市</option>'+
            '<option value="五霞町">五霞町</option>'+
            '<option value="境町">境町</option>'+
            '<option value="桜川市">桜川市</option>'+
            '<option value="下妻市">下妻市</option>'+
            '<option value="常総市">常総市</option>'+
            '<option value="城里町">城里町</option>'+
            '<option value="大子町">大子町</option>'+
            '<option value="高萩市">高萩市</option>'+
            '<option value="筑西市">筑西市</option>'+
            '<option value="つくば市">つくば市</option>'+
            '<option value="つくばみらい市">つくばみらい市</option>'+
            '<option value="土浦市">土浦市</option>'+
            '<option value="東海村">東海村</option>'+
            '<option value="利根町">利根町</option>'+
            '<option value="取手市">取手市</option>'+
            '<option value="那珂市">那珂市</option>'+
            '<option value="行方市">行方市</option>'+
            '<option value="坂東市">坂東市</option>'+
            '<option value="常陸太田市">常陸太田市</option>'+
            '<option value="常陸大宮市">常陸大宮市</option>'+
            '<option value="日立市">日立市</option>'+
            '<option value="ひたちなか市">ひたちなか市</option>'+
            '<option value="鉾田市">鉾田市</option>'+
            '<option value="水戸市">水戸市</option>'+
            '<option value="美浦村">美浦村</option>'+
            '<option value="守谷市">守谷市</option>'+
            '<option value="八千代町">八千代町</option>'+
            '<option value="結城市">結城市</option>'+
            '<option value="龍ケ崎市">龍ケ崎市</option>'+
        '</select>'+
    '</form>';

    Tochigi =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="足利市">足利市</option>'+
            '<option value="市貝町">市貝町</option>'+
            '<option value="宇都宮市">宇都宮市</option>'+
            '<option value="大田原市">大田原市</option>'+
            '<option value="小山市">小山市</option>'+
            '<option value="鹿沼市">鹿沼市</option>'+
            '<option value="上三川町">上三川町</option>'+
            '<option value="さくら市">さくら市</option>'+
            '<option value="佐野市">佐野市</option>'+
            '<option value="塩谷町">塩谷町</option>'+
            '<option value="下野市">下野市</option>'+
            '<option value="高根沢町">高根沢町</option>'+
            '<option value="栃木市">栃木市</option>'+
            '<option value="那珂川町">那珂川町</option>'+
            '<option value="那須烏山市">那須烏山市</option>'+
            '<option value="那須塩原市">那須塩原市</option>'+
            '<option value="那須町">那須町</option>'+
            '<option value="日光市">日光市</option>'+
            '<option value="野木町">野木町</option>'+
            '<option value="芳賀町">芳賀町</option>'+
            '<option value="益子町">益子町</option>'+
            '<option value="壬生町">壬生町</option>'+
            '<option value="真岡市">真岡市</option>'+
            '<option value="茂木町">茂木町</option>'+
            '<option value="矢板市">矢板市</option>'+
        '</select>'+
    '</form>';

    Gunma = 
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="安中市">安中市</option>'+
            '<option value="伊勢崎市">伊勢崎市</option>'+
            '<option value="板倉町">板倉町</option>'+
            '<option value="上野村">上野村</option>'+
            '<option value="邑楽町">邑楽町</option>'+
            '<option value="大泉町">大泉町</option>'+
            '<option value="太田市">太田市</option>'+
            '<option value="片品村">片品村</option>'+
            '<option value="川場村">川場村</option>'+
            '<option value="神流町">神流町</option>'+
            '<option value="甘楽町">甘楽町</option>'+
            '<option value="桐生市">桐生市</option>'+
            '<option value="草津町">草津町</option>'+
            '<option value="渋川市">渋川市</option>'+
            '<option value="下仁田町">下仁田町</option>'+
            '<option value="昭和村">昭和村</option>'+
            '<option value="榛東村">榛東村</option>'+
            '<option value="高崎市">高崎市</option>'+
            '<option value="高山村">高山村</option>'+
            '<option value="館林市">館林市</option>'+
            '<option value="玉村町">玉村町</option>'+
            '<option value="千代田町">千代田町</option>'+
            '<option value="嬬恋村">嬬恋村</option>'+
            '<option value="富岡市">富岡市</option>'+
            '<option value="中之条町">中之条町</option>'+
            '<option value="長野原町">長野原町</option>'+
            '<option value="南牧村">南牧村</option>'+
            '<option value="沼田市">沼田市</option>'+
            '<option value="東吾妻町">東吾妻町</option>'+
            '<option value="藤岡市">藤岡市</option>'+
            '<option value="前橋市">前橋市</option>'+
            '<option value="みどり市">みどり市</option>'+
            '<option value="みなかみ町">みなかみ町</option>'+
            '<option value="明和町">明和町</option>'+
            '<option value="吉岡町">吉岡町</option>'+
        '</select>'+
    '</form>';

    Saitama =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="上尾市">上尾市</option>'+
            '<option value="朝霞市">朝霞市</option>'+
            '<option value="伊奈町">伊奈町</option>'+
            '<option value="入間市">入間市</option>'+
            '<option value="小鹿野町">小鹿野町</option>'+
            '<option value="小川町">小川町</option>'+
            '<option value="桶川市">桶川市</option>'+
            '<option value="越生町">越生町</option>'+
            '<option value="春日部市">春日部市</option>'+
            '<option value="加須市">加須市</option>'+
            '<option value="神川町">神川町</option>'+
            '<option value="上里町">上里町</option>'+
            '<option value="川口市">川口市</option>'+
            '<option value="川越市">川越市</option>'+
            '<option value="川島町">川島町</option>'+
            '<option value="北本市">北本市</option>'+
            '<option value="行田市">行田市</option>'+
            '<option value="久喜市">久喜市</option>'+
            '<option value="熊谷市">熊谷市</option>'+
            '<option value="鴻巣市">鴻巣市</option>'+
            '<option value="越谷市">越谷市</option>'+
            '<option value="さいたま市">さいたま市</option>'+
            '<option value="坂戸市">坂戸市</option>'+
            '<option value="幸手市">幸手市</option>'+
            '<option value="狭山市">狭山市</option>'+
            '<option value="志木市">志木市</option>'+
            '<option value="白岡市">白岡市</option>'+
            '<option value="杉戸町">杉戸町</option>'+
            '<option value="草加市">草加市</option>'+
            '<option value="秩父市">秩父市</option>'+
            '<option value="鶴ヶ島市">鶴ヶ島市</option>'+
            '<option value="ときがわ町">ときがわ町</option>'+
            '<option value="所沢市">所沢市</option>'+
            '<option value="戸田市">戸田市</option>'+
            '<option value="長瀞町">長瀞町</option>'+
            '<option value="滑川町">滑川町</option>'+
            '<option value="新座市">新座市</option>'+
            '<option value="蓮田市">蓮田市</option>'+
            '<option value="鳩山町">鳩山町</option>'+
            '<option value="羽生市">羽生市</option>'+
            '<option value="飯能市">飯能市</option>'+
            '<option value="東秩父村">東秩父村</option>'+
            '<option value="東松山市">東松山市</option>'+
            '<option value="日高市">日高市</option>'+
            '<option value="深谷市">深谷市</option>'+
            '<option value="富士見市">富士見市</option>'+
            '<option value="ふじみ野市">ふじみ野市</option>'+
            '<option value="本庄市">本庄市</option>'+
            '<option value="松伏町">松伏町</option>'+
            '<option value="三郷市">三郷市</option>'+
            '<option value="美里町">美里町</option>'+
            '<option value="皆野町">皆野町</option>'+
            '<option value="宮代町">宮代町</option>'+
            '<option value="三芳町">三芳町</option>'+
            '<option value="毛呂山町">毛呂山町</option>'+
            '<option value="八潮市">八潮市</option>'+
            '<option value="横瀬町">横瀬町</option>'+
            '<option value="吉川市">吉川市</option>'+
            '<option value="吉見町">吉見町</option>'+
            '<option value="寄居町">寄居町</option>'+
            '<option value="嵐山町">嵐山町</option>'+
            '<option value="和光市">和光市</option>'+
            '<option value="蕨市">蕨市</option>'+
        '</select>'+
    '</form>';

    Chiba =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="旭市">旭市</option>'+
            '<option value="我孫子市">我孫子市</option>'+
            '<option value="いすみ市">いすみ市</option>'+
            '<option value="市川市">市川市</option>'+
            '<option value="一宮町">一宮町</option>'+
            '<option value="市原市">市原市</option>'+
            '<option value="印西市">印西市</option>'+
            '<option value="浦安市">浦安市</option>'+
            '<option value="大網白里市">大網白里市</option>'+
            '<option value="大多喜町">大多喜町</option>'+
            '<option value="御宿町">御宿町</option>'+
            '<option value="柏市">柏市</option>'+
            '<option value="勝浦市">勝浦市</option>'+
            '<option value="香取市">香取市</option>'+
            '<option value="鎌ケ谷市">鎌ケ谷市</option>'+
            '<option value="鴨川市">鴨川市</option>'+
            '<option value="木更津市">木更津市</option>'+
            '<option value="君津市">君津市</option>'+
            '<option value="鋸南町">鋸南町</option>'+
            '<option value="九十九里町">九十九里町</option>'+
            '<option value="神崎町">神崎町</option>'+
            '<option value="栄町">栄町</option>'+
            '<option value="佐倉市">佐倉市</option>'+
            '<option value="山武市">山武市</option>'+
            '<option value="酒々井町">酒々井町</option>'+
            '<option value="芝山町">芝山町</option>'+
            '<option value="白子町">白子町</option>'+
            '<option value="白井市">白井市</option>'+
            '<option value="匝瑳市">匝瑳市</option>'+
            '<option value="袖ケ浦市">袖ケ浦市</option>'+
            '<option value="多古町">多古町</option>'+
            '<option value="館山市">館山市</option>'+
            '<option value="千葉市">千葉市</option>'+
            '<option value="銚子市">銚子市</option>'+
            '<option value="長生村">長生村</option>'+
            '<option value="長南町">長南町</option>'+
            '<option value="東金市">東金市</option>'+
            '<option value="東庄町">東庄町</option>'+
            '<option value="富里市">富里市</option>'+
            '<option value="長柄町">長柄町</option>'+
            '<option value="流山市">流山市</option>'+
            '<option value="習志野市">習志野市</option>'+
            '<option value="成田市">成田市</option>'+
            '<option value="野田市">野田市</option>'+
            '<option value="富津市">富津市</option>'+
            '<option value="船橋市">船橋市</option>'+
            '<option value="松戸市">松戸市</option>'+
            '<option value="南房総市">南房総市</option>'+
            '<option value="睦沢町">睦沢町</option>'+
            '<option value="茂原市">茂原市</option>'+
            '<option value="八街市">八街市</option>'+
            '<option value="八街市">八街市</option>'+
            '<option value="横芝光町"></option>'+
            '<option value="四街道市">四街道市</option>'+
        '</select>'+
    '</form>';

    Tokyo =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="青ヶ島村">青ヶ島村</option>'+
            '<option value="昭島市">昭島市</option>'+
            '<option value="あきる野市">あきる野市</option>'+
            '<option value="足立区">足立区</option>'+
            '<option value="荒川区">荒川区</option>'+
            '<option value="板橋区">板橋区</option>'+
            '<option value="稲城市">稲城市</option>'+
            '<option value="江戸川区">江戸川区</option>'+
            '<option value="青梅市">青梅市</option>'+
            '<option value="大島町">大島町</option>'+
            '<option value="大田区">大田区</option>'+
            '<option value="小笠原村">小笠原村</option>'+
            '<option value="葛飾区">葛飾区</option>'+
            '<option value="北区">北区</option>'+
            '<option value="清瀬市">清瀬市</option>'+
            '<option value="国立市">国立市</option>'+
            '<option value="神津島村">神津島村</option>'+
            '<option value="江東区">江東区</option>'+
            '<option value="小金井市">小金井市</option>'+
            '<option value="国分寺市">国分寺市</option>'+
            '<option value="小平市">小平市</option>'+
            '<option value="狛江市">狛江市</option>'+
            '<option value="品川区">品川区</option>'+
            '<option value="渋谷区">渋谷区</option>'+
            '<option value="新宿区">新宿区</option>'+
            '<option value="杉並区">杉並区</option>'+
            '<option value="墨田区">墨田区</option>'+
            '<option value="世田谷区">世田谷区</option>'+
            '<option value="台東区">台東区</option>'+
            '<option value="立川市">立川市</option>'+
            '<option value="多摩市">多摩市</option>'+
            '<option value="中央区">中央区</option>'+
            '<option value="調布市">調布市</option>'+
            '<option value="千代田区">千代田区</option>'+
            '<option value="豊島区">豊島区</option>'+
            '<option value="利島村">利島村</option>'+
            '<option value="中野区">中野区</option>'+
            '<option value="新島村">新島村</option>'+
            '<option value="西多摩郡奥多摩町">西多摩郡奥多摩町</option>'+
            '<option value="西多摩郡日の出町">西多摩郡日の出町</option>'+
            '<option value="西多摩郡檜原村">西多摩郡檜原村</option>'+
            '<option value="西多摩郡瑞穂町">西多摩郡瑞穂町</option>'+
            '<option value="西東京市">西東京市</option>'+
            '<option value="練馬区">練馬区</option>'+
            '<option value="八王子市">八王子市</option>'+
            '<option value="八丈島八丈町">八丈島八丈町</option>'+
            '<option value="羽村市">羽村市</option>'+
            '<option value="東久留米市">東久留米市</option>'+
            '<option value="東村山市">東村山市</option>'+
            '<option value="東大和市">東大和市</option>'+
            '<option value="日野市">日野市</option>'+
            '<option value="府中市">府中市</option>'+
            '<option value="福生市">福生市</option>'+
            '<option value="文京区">文京区</option>'+
            '<option value="町田市">町田市</option>'+
            '<option value="御蔵島村">御蔵島村</option>'+
            '<option value="三鷹市">三鷹市</option>'+
            '<option value="港区">港区</option>'+
            '<option value="三宅島三宅村">三宅島三宅村</option>'+
            '<option value="武蔵野市">武蔵野市</option>'+
            '<option value="武蔵村山市">武蔵村山市</option>'+
            '<option value="目黒区">目黒区</option>'+
        '</select>'+
    '</form>';

    Kanagawa = 
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="愛川町">愛川町</option>'+
            '<option value="厚木市">厚木市</option>'+
            '<option value="綾瀬市">綾瀬市</option>'+
            '<option value="伊勢原市">伊勢原市</option>'+
            '<option value="海老名市">海老名市</option>'+
            '<option value="大磯町">大磯町</option>'+
            '<option value="大井町">大井町</option>'+
            '<option value="小田原市">小田原市</option>'+
            '<option value="開成町">開成町</option>'+
            '<option value="鎌倉市">鎌倉市</option>'+
            '<option value="川崎市">川崎市</option>'+
            '<option value="清川村">清川村</option>'+
            '<option value="相模原市">相模原市</option>'+
            '<option value="座間市">座間市</option>'+
            '<option value="寒川町">寒川町</option>'+
            '<option value="逗子市">逗子市</option>'+
            '<option value="茅ヶ崎市">茅ヶ崎市</option>'+
            '<option value="中井町">中井町</option>'+
            '<option value="二宮町">二宮町</option>'+
            '<option value="箱根町">箱根町</option>'+
            '<option value="秦野市">秦野市</option>'+
            '<option value="葉山町">葉山町</option>'+
            '<option value="平塚市">平塚市</option>'+
            '<option value="藤沢市">藤沢市</option>'+
            '<option value="松田町">松田町</option>'+
            '<option value="真鶴町">真鶴町</option>'+
            '<option value="三浦市">三浦市</option>'+
            '<option value="南足柄市">南足柄市</option>'+
            '<option value="山北町">山北町</option>'+
            '<option value="大和市">大和市</option>'+
            '<option value="湯河原町">湯河原町</option>'+
            '<option value="横須賀市">横須賀市</option>'+
            '<option value="横浜市">横浜市</option>'+
        '</select>'+
    '</form>';

    Niigata =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="阿賀野市">阿賀野市</option>'+
            '<option value="阿賀町">阿賀町</option>'+
            '<option value="粟島浦村">粟島浦村</option>'+
            '<option value="出雲崎町">出雲崎町</option>'+
            '<option value="糸魚川市">糸魚川市</option>'+
            '<option value="魚沼市">魚沼市</option>'+
            '<option value="小千谷市">小千谷市</option>'+
            '<option value="柏崎市">柏崎市</option>'+
            '<option value="加茂市">加茂市</option>'+
            '<option value="刈羽村">刈羽村</option>'+
            '<option value="五泉市">五泉市</option>'+
            '<option value="佐渡市">佐渡市</option>'+
            '<option value="三条市">三条市</option>'+
            '<option value="新発田市">新発田市</option>'+
            '<option value="上越市">上越市</option>'+
            '<option value="聖籠町">聖籠町</option>'+
            '<option value="関川村">関川村</option>'+
            '<option value="胎内市">胎内市</option>'+
            '<option value="田上町">田上町</option>'+
            '<option value="津南町">津南町</option>'+
            '<option value="燕市">燕市</option>'+
            '<option value="十日町市">十日町市</option>'+
            '<option value="長岡市">長岡市</option>'+
            '<option value="新潟市">新潟市</option>'+
            '<option value="見附市">見附市</option>'+
            '<option value="南魚沼市">南魚沼市</option>'+
            '<option value="妙高市">妙高市</option>'+
            '<option value="村上市">村上市</option>'+
            '<option value="弥彦村">弥彦村</option>'+
            '<option value="湯沢町">湯沢町</option>'+
        '</select>'+
    '</form>';

    Toyama =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="朝日町">朝日町</option>'+
            '<option value="射水市">射水市</option>'+
            '<option value="魚津市">魚津市</option>'+
            '<option value="小矢部市">小矢部市</option>'+
            '<option value="上市町">上市町</option>'+
            '<option value="黒部市">黒部市</option>'+
            '<option value="高岡市">高岡市</option>'+
            '<option value="立山町">立山町</option>'+
            '<option value="砺波市">砺波市</option>'+
            '<option value="富山市">富山市</option>'+
            '<option value="滑川市">滑川市</option>'+
            '<option value="南砺市">南砺市</option>'+
            '<option value="入善町">入善町</option>'+
            '<option value="氷見市">氷見市</option>'+
            '<option value="舟橋村">舟橋村</option>'+
        '</select>'+
    '</form>';

    Ishikawa =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="穴水町">穴水町</option>'+
            '<option value="内灘町">内灘町</option>'+
            '<option value="内灘町">内灘町</option>'+
            '<option value="金沢市">金沢市</option>'+
            '<option value="かほく市">かほく市</option>'+
            '<option value="川北町">川北町</option>'+
            '<option value="小松市">小松市</option>'+
            '<option value="志賀町">志賀町</option>'+
            '<option value="珠洲市">珠洲市</option>'+
            '<option value="津幡町">津幡町</option>'+
            '<option value="中能登町">中能登町</option>'+
            '<option value="七尾市">七尾市</option>'+
            '<option value="能登町">能登町</option>'+
            '<option value="野々市市">野々市市</option>'+
            '<option value="能美市">能美市</option>'+
            '<option value="羽咋市">羽咋市</option>'+
            '<option value="白山市">白山市</option>'+
            '<option value="宝達志水町">宝達志水町</option>'+
            '<option value="輪島市">輪島市</option>'+
        '</select>'+
    '</form>';

    Fukui =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="あわら市">あわら市</option>'+
            '<option value="池田町">池田町</option>'+
            '<option value="永平寺町">永平寺町</option>'+
            '<option value="越前市">越前市</option>'+
            '<option value="越前町">越前町</option>'+
            '<option value="おおい町">おおい町</option>'+
            '<option value="大野市">大野市</option>'+
            '<option value="小浜市">小浜市</option>'+
            '<option value="勝山市">勝山市</option>'+
            '<option value="坂井市">坂井市</option>'+
            '<option value="鯖江市">鯖江市</option>'+
            '<option value="高浜町">高浜町</option>'+
            '<option value="敦賀市">敦賀市</option>'+
            '<option value="福井市">福井市</option>'+
            '<option value="南越前町">南越前町</option>'+
            '<option value="美浜町">美浜町</option>'+
            '<option value="若狭町">若狭町</option>'+
        '</select>'+
    '</form>';
    Yamanashi =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="市川三郷町">市川三郷町</option>'+
            '<option value="上野原市">上野原市</option>'+
            '<option value="大月市">大月市</option>'+
            '<option value="忍野村">忍野村</option>'+
            '<option value="甲斐市">甲斐市</option>'+
            '<option value="甲州市">甲州市</option>'+
            '<option value="甲府市">甲府市</option>'+
            '<option value="小菅村">小菅村</option>'+
            '<option value="昭和町">昭和町</option>'+
            '<option value="丹波山村">丹波山村</option>'+
            '<option value="中央市">中央市</option>'+
            '<option value="都留市">都留市</option>'+
            '<option value="道志村">道志村</option>'+
            '<option value="鳴沢村">鳴沢村</option>'+
            '<option value="南部町">南部町</option>'+
            '<option value="西桂町">西桂町</option>'+
            '<option value="韮崎市">韮崎市</option>'+
            '<option value="早川町">早川町</option>'+
            '<option value="笛吹市">笛吹市</option>'+
            '<option value="富士河口湖町">富士河口湖町</option>'+
            '<option value="富士川町">富士川町</option>'+
            '<option value="富士吉田市">富士吉田市</option>'+
            '<option value="北杜市">北杜市</option>'+
            '<option value="南アルプス市">南アルプス市</option>'+
            '<option value="身延町">身延町</option>'+
            '<option value="山中湖村">山中湖村</option>'+
            '<option value="山梨市">山梨市</option>'+
        '</select>'+
    '</form>';

    Nagano =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="青木村">青木村</option>'+
            '<option value="上松町">上松町</option>'+
            '<option value="朝日村">朝日村</option>'+
            '<option value="安曇野市">安曇野市</option>'+
            '<option value="阿智村">阿智村</option>'+
            '<option value="阿南町">阿南町</option>'+
            '<option value="飯島町">飯島町</option>'+
            '<option value="飯田市">飯田市</option>'+
            '<option value="飯綱町">飯綱町</option>'+
            '<option value="飯山市">飯山市</option>'+
            '<option value="生坂村">生坂村</option>'+
            '<option value="池田町">池田町</option>'+
            '<option value="伊那市">伊那市</option>'+
            '<option value="上田市">上田市</option>'+
            '<option value="売木村">売木村</option>'+
            '<option value="王滝村">王滝村</option>'+
            '<option value="大桑村">大桑村</option>'+
            '<option value="大鹿村">大鹿村</option>'+
            '<option value="大町市">大町市</option>'+
            '<option value="岡谷市">岡谷市</option>'+
            '<option value="小川村">小川村</option>'+
            '<option value="小谷村">小谷村</option>'+
            '<option value="小布施町">小布施町</option>'+
            '<option value="麻績村">麻績村</option>'+
            '<option value="軽井沢町">軽井沢町</option>'+
            '<option value="川上村">川上村</option>'+
            '<option value="木島平村">木島平村</option>'+
            '<option value="木曽町">木曽町</option>'+
            '<option value="木祖村">木祖村</option>'+
            '<option value="北相木村">北相木村</option>'+
            '<option value="小海町">小海町</option>'+
            '<option value="駒ヶ根市">駒ヶ根市</option>'+
            '<option value="小諸市">小諸市</option>'+
            '<option value="栄村">栄村</option>'+
            '<option value="坂城町">坂城町</option>'+
            '<option value="佐久市">佐久市</option>'+
            '<option value="佐久穂町">佐久穂町</option>'+
            '<option value="塩尻市">塩尻市</option>'+
            '<option value="信濃町">信濃町</option>'+
            '<option value="下條村">下條村</option>'+
            '<option value="下諏訪町">下諏訪町</option>'+
            '<option value="須坂市">須坂市</option>'+
            '<option value="諏訪市">諏訪市</option>'+
            '<option value="喬木村">喬木村</option>'+
            '<option value="高森町">高森町</option>'+
            '<option value="高山村">高山村</option>'+
            '<option value="辰野町">辰野町</option>'+
            '<option value="立科町">立科町</option>'+
            '<option value="筑北村">筑北村</option>'+
            '<option value="千曲市">千曲市</option>'+
            '<option value="茅野市">茅野市</option>'+
            '<option value="天龍村">天龍村</option>'+
            '<option value="東御市">東御市</option>'+
            '<option value="豊丘村">豊丘村</option>'+
            '<option value="中川村">中川村</option>'+
            '<option value="中野市">中野市</option>'+
            '<option value="長野市">長野市</option>'+
            '<option value="長和町">長和町</option>'+
            '<option value="南木曽町">南木曽町</option>'+
            '<option value="根羽村">根羽村</option>'+
            '<option value="野沢温泉村">野沢温泉村</option>'+
            '<option value="白馬村">白馬村</option>'+
            '<option value="原村">原村</option>'+
            '<option value="平谷村">平谷村</option>'+
            '<option value="富士見町">富士見町</option>'+
            '<option value="松川町">松川町</option>'+
            '<option value="松川村">松川村</option>'+
            '<option value="松本市">松本市</option>'+
            '<option value="南相木村">南相木村</option>'+
            '<option value="南牧村">南牧村</option>'+
            '<option value="南箕輪村">南箕輪村</option>'+
            '<option value="箕輪町">箕輪町</option>'+
            '<option value="宮田村">宮田村</option>'+
            '<option value="御代田町">御代田町</option>'+
            '<option value="泰阜村">泰阜村</option>'+
            '<option value="山形村">山形村</option>'+
            '<option value="山ノ内町">山ノ内町</option>'+
        '</select>'+
    '</form>';

    Gifu =
   '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="安八町">安八町</option>'+
            '<option value="池田町">池田町</option>'+
            '<option value="揖斐川町">揖斐川町</option>'+
            '<option value="恵那市">恵那市</option>'+
            '<option value="大垣市">大垣市</option>'+
            '<option value="大野町">大野町</option>'+
            '<option value="海津市">海津市</option>'+
            '<option value="各務原市">各務原市</option>'+
            '<option value="笠松町">笠松町</option>'+
            '<option value="可児市">可児市</option>'+
            '<option value="川辺町">川辺町</option>'+
            '<option value="北方町">北方町</option>'+
            '<option value="岐南町">岐南町</option>'+
            '<option value="岐阜市">岐阜市</option>'+
            '<option value="郡上市">郡上市</option>'+
            '<option value="下呂市">下呂市</option>'+
            '<option value="神戸町">神戸町</option>'+
            '<option value="坂祝町">坂祝町</option>'+
            '<option value="白川町">白川町</option>'+
            '<option value="白川村">白川村</option>'+
            '<option value="関ケ原町">関ケ原町</option>'+
            '<option value="関市">関市</option>'+
            '<option value="高山市">高山市</option>'+
            '<option value="多治見市">多治見市</option>'+
            '<option value="垂井町">垂井町</option>'+
            '<option value="土岐市">土岐市</option>'+
            '<option value="富加町">富加町</option>'+
            '<option value="中津川市">中津川市</option>'+
            '<option value="羽島市">羽島市</option>'+
            '<option value="東白川村">東白川村</option>'+
            '<option value="本巣市">本巣市</option>'+
            '<option value="飛騨市">飛騨市</option>'+
            '<option value="七宗町">七宗町</option>'+
            '<option value="瑞浪市">瑞浪市</option>'+
            '<option value="瑞穂市">瑞穂市</option>'+
            '<option value="御嵩町">御嵩町</option>'+
            '<option value="美濃加茂市">美濃加茂市</option>'+
            '<option value="美濃市">美濃市</option>'+
            '<option value="‎八百津町">八百津町</option>'+
            '<option value="山県市">山県市</option>'+
            '<option value="養老町">養老町</option>'+
            '<option value="輪之内町">輪之内町</option>'+
        '</select>'+
    '</form>';

    Shizuoka =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="熱海市">熱海市</option>'+
            '<option value="伊豆市">伊豆市</option>'+
            '<option value="伊豆の国市">伊豆の国市</option>'+
            '<option value="伊東市">伊東市</otion>'+
            '<option value="磐田市">磐田市</option>'+
            '<option value="御前崎市">御前崎市</option>'+
            '<option value="小山町">小山町</option>'+
            '<option value="掛川市">掛川市</option>'+
            '<option value="河津町">河津町</option>'+
            '<option value="川根本町">川根本町</option>'+
            '<option value="函南町">函南町</option>'+
            '<option value="菊川市">菊川市</option>'+
            '<option value="湖西市">湖西市</option>'+
            '<option value="御殿場市">御殿場市</option>'+
            '<option value="静岡市">静岡市</option>'+
            '<option value="島田市">島田市</option>'+
            '<option value="清水町">清水町</option>'+
            '<option value="下田市">下田市</option>'+
            '<option value="裾野市">裾野市</option>'+
            '<option value="長泉町">長泉町</option>'+
            '<option value="西伊豆町">西伊豆町</option>'+
            '<option value="沼津市">沼津市</option>'+
            '<option value="浜松市">浜松市</option>'+
            '<option value="東伊豆町">東伊豆町</option>'+
            '<option value="袋井市">袋井市</option>'+
            '<option value="藤枝市">藤枝市</option>'+
            '<option value="富士市">富士市</option>'+
            '<option value="富士宮市">富士宮市</option>'+
            '<option value="牧之原市">牧之原市</option>'+
            '<option value="松崎町">松崎町</option>'+
            '<option value="三島市">三島市</option>'+
            '<option value="南伊豆町">南伊豆町</option>'+
            '<option value="森町">森町</option>'+
            '<option value="焼津市">焼津市</option>'+
            '<option value="吉田町">吉田町</option>'+
        '</select>'+
    '</form>';

    Aichi =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="愛西市">愛西市</option>'+
            '<option value="阿久比町">阿久比町</option>'+
            '<option value="あま市">あま市</option>'+
            '<option value="安城市">安城市</option>'+
            '<option value="一宮市">一宮市</option>'+
            '<option value="稲沢市">稲沢市</option>'+
            '<option value="犬山市">犬山市</option>'+
            '<option value="岩倉市">岩倉市</option>'+
            '<option value="大口町">大口町</option>'+
            '<option value="大治町">大治町</option>'+
            '<option value="大府市">大府市</option>'+
            '<option value="岡崎市">岡崎市</option>'+
            '<option value="尾張旭市">尾張旭市</option>'+
            '<option value="春日井市">春日井市</option>'+
            '<option value="蟹江町">蟹江町</option>'+
            '<option value="蒲郡市">蒲郡市</option>'+
            '<option value="刈谷市">刈谷市</option>'+
            '<option value="北名古屋市">北名古屋市</option>'+
            '<option value="清須市">清須市</option>'+
            '<option value="幸田町">幸田町</option>'+
            '<option value="江南市">江南市</option>'+
            '<option value="小牧市">小牧市</option>'+
            '<option value="設楽町">設楽町</option>'+
            '<option value="新城市">新城市</option>'+
            '<option value="瀬戸市">瀬戸市</option>'+
            '<option value="高浜市">高浜市</option>'+
            '<option value="武豊町">武豊町</option>'+
            '<option value="田原市">田原市</option>'+
            '<option value="知多市">知多市</option>'+
            '<option value="知立市">知立市</option>'+
            '<option value="知立市">知立市</option>'+
            '<option value="東栄町">東栄町</option>'+
            '<option value="東海市">東海市</option>'+
            '<option value="東郷町">東郷町</option>'+
            '<option value="常滑市">常滑市</option>'+
            '<option value="飛島村">飛島村</option>'+
            '<option value="豊明市">豊明市</option>'+
            '<option value="豊川市">豊川市</option>'+
            '<option value="豊田市">豊田市</option>'+
            '<option value="豊根村">豊根村</option>'+
            '<option value="豊橋市">豊橋市</option>'+
            '<option value="豊山町">豊山町</option>'+
            '<option value="長久手市">長久手市</option>'+
            '<option value="名古屋市">名古屋市</option>'+
            '<option value="西尾市">西尾市</option>'+
            '<option value="日進市>日進市</option>'+
            '<option value="半田市">半田市</option>'+
            '<option value="東浦町">東浦町</option>'+
            '<option value="扶桑町">扶桑町</option>'+
            '<option value="碧南市">碧南市</option>'+
            '<option value="南知多町">南知多町</option>'+
            '<option value="美浜町">美浜町</option>'+
            '<option value="みよし市">みよし市</option>'+
            '<option value="弥富市">弥富市</option>'+
        '</select>'+
    '</form>';
    
    Mie =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="朝日町">朝日町</option>'+
            '<option value="伊賀市">伊賀市</option>'+
            '<option value="伊勢市">伊勢市</option>'+
            '<option value="いなべ市">いなべ市</option>'+
            '<option value="大台町">大台町</option>'+
            '<option value="尾鷲市">尾鷲市</option>'+
            '<option value="亀山市">亀山市</option>'+
            '<option value="川越町">川越町</option>'+
            '<option value="木曽岬町">木曽岬町</option>'+
            '<option value="紀宝町">紀宝町</option>'+
            '<option value="紀北町">紀北町</option>'+
            '<option value="熊野市">熊野市</option>'+
            '<option value="桑名市">桑名市</option>'+
            '<option value="菰野町">菰野町</option>'+
            '<option value="志摩市">志摩市</option>'+
            '<option value="鈴鹿市">鈴鹿市</option>'+
            '<option value="大紀町">大紀町</option>'+
            '<option value="多気町">多気町</option>'+
            '<option value="玉城町">玉城町</option>'+
            '<option value="津市">津市</option>'+
            '<option value="東員町">東員町</option>'+
            '<option value="鳥羽市">鳥羽市</option>'+
            '<option value="名張市">名張市</option>'+
            '<option value="松阪市">松阪市</option>'+
            '<option value="南伊勢町">南伊勢町</option>'+
            '<option value="御浜町">御浜町</option>'+
            '<option value="明和町">明和町</option>'+
            '<option value="四日市市">四日市市</option>'+
            '<option value="度会町">度会町</option>'+
        '</select>'+
    '</form>';

    Shiga =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="愛荘町">愛荘町</option>'+
            '<option value="近江八幡市">近江八幡市</option>'+
            '<option value="大津市">大津市</option>'+
            '<option value="草津市">草津市</option>'+
            '<option value="甲賀市">甲賀市</option>'+
            '<option value="甲良町">甲良町</option>'+
            '<option value="湖南市">湖南市</option>'+
            '<option value="高島市">高島市</option>'+
            '<option value="多賀町">多賀町</option>'+
            '<option value="豊郷町">豊郷町</option>'+
            '<option value="長浜市">長浜市</option>'+
            '<option value="東近江市">東近江市</option>'+
            '<option value="彦根市">彦根市</option>'+
            '<option value="日野町">日野町</option>'+
            '<option value="米原市">米原市</option>'+
            '<option value="守山市">守山市</option>'+
            '<option value="野洲市">野洲市</option>'+
            '<option value="栗東市">栗東市</option>'+
            '<option value="竜王町">竜王町</option>'+
        '</select>'+
    '</form>';

    Kyoto =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="綾部市">綾部市</option>'+
            '<option value="井手町">井手町</option>'+
            '<option value="伊根町">伊根町</option>'+
            '<option value="宇治市">宇治市</option>'+
            '<option value="宇治田原町">宇治田原町</option>'+
            '<option value="大山崎町">大山崎町</option>'+
            '<option value="笠置町">笠置町</option>'+
            '<option value="亀岡市">亀岡市</option>'+
            '<option value="木津川市">木津川市</option>'+
            '<option value="京田辺市">京田辺市</option>'+
            '<option value="京丹後市">京丹後市</option>'+
            '<option value="京丹波町">京丹波町</option>'+
            '<option value="京都市">京都市</option>'+
            '<option value="久御山町">久御山町</option>'+
            '<option value="城陽市">城陽市</option>'+
            '<option value="精華町">精華町</option>'+
            '<option value="長岡京市">長岡京市</option>'+
            '<option value="南丹市">南丹市</option>'+
            '<option value="福知山市">福知山市</option>'+
            '<option value="舞鶴市">舞鶴市</option>'+
            '<option value="南山城村">南山城村</option>'+
            '<option value="宮津市">宮津市</option>'+
            '<option value="向日市">向日市</option>'+
            '<option value="八幡市">八幡市</option>'+
            '<option value="与謝野町">与謝野町</option>'+
            '<option value="和束町">和束町</option>'+
        '</select>'+
    '</form>';

    Osaka = 
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="池田市">池田市</option>'+
            '<option value="泉大津市">泉大津市</option>'+
            '<option value="泉佐野市">泉佐野市</option>'+
            '<option value="和泉市">和泉市</option>'+
            '<option value="茨木市">茨木市</option>'+
            '<option value="大阪狭山市">大阪狭山市</option>'+
            '<option value="大阪市">大阪市</option>'+
            '<option value="貝塚市">貝塚市</option>'+
            '<option value="柏原市">柏原市</option>'+
            '<option value="交野市">交野市</option>'+
            '<option value="交野町">交野町</option>'+
            '<option value="門真市">門真市</option>'+
            '<option value="河南町">河南町</option>'+
            '<option value="河内長野市">河内長野市</option>'+
            '<option value="岸和田市">岸和田市</option>'+
            '<option value="熊取町">熊取町</option>'+
            '<option value="堺市">堺市</option>'+
            '<option value="狭山町">狭山町</option>'+
            '<option value="四條畷市">四條畷市</option>'+
            '<option value="島本町">島本町</option>'+
            '<option value="吹田市">吹田市</option>'+
            '<option value="摂津市">摂津市</option>'+
            '<option value="泉南市">泉南市</option>'+
            '<option value="泉南町">泉南町</option>'+
            '<option value="太子町">太子町</option>'+
            '<option value="高石市">高石市</option>'+
            '<option value="高槻市">高槻市</option>'+
            '<option value="田尻町">田尻町</option>'+
            '<option value="忠岡町">忠岡町</option>'+
            '<option value="大東市">大東市</option>'+
            '<option value="千早赤阪村">千早赤阪村</option>'+
            '<option value="豊中市">豊中市</option>'+
            '<option value="豊能町">豊能町</option>'+
            '<option value="富田林市">富田林市</option>'+
            '<option value="南海町">南海町</option>'+
            '<option value="寝屋川市">寝屋川市</option>'+
            '<option value="能勢町">能勢町</option>'+
            '<option value="羽曳野市">羽曳野市</option>'+
            '<option value="阪南市">阪南市</option>'+
            '<option value="阪南町">阪南町</option>'+
            '<option value="東大阪市">東大阪市</option>'+
            '<option value="東鳥取町">東鳥取町</option>'+
            '<option value="東能瀬村">東能瀬村</option>'+
            '<option value="枚方市">枚方市</option>'+
            '<option value="藤井寺市">藤井寺市</option>'+
            '<option value="松原市">松原市</option>'+
            '<option value="岬町">岬町</option>'+
            '<option value="箕面市">箕面市</option>'+
            '<option value="美原町">美原町</option>'+
            '<option value="守口市">守口市</option>'+
            '<option value="八尾市">八尾市</option>'+
        '</select>'+
    '</form>';

    Hyogo =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="相生市">相生市</option>'+
            '<option value="明石市">明石市</option>'+
            '<option value="赤穂市">赤穂市</option>'+
            '<option value="朝来市">朝来市</option>'+
            '<option value="芦屋市">芦屋市</option>'+
            '<option value="尼崎市">尼崎市</option>'+
            '<option value="淡路市">淡路市</option>'+
            '<option value="伊丹市">伊丹市</option>'+
            '<option value="市川町">市川町</option>'+
            '<option value="猪名川町">猪名川町</option>'+
            '<option value="稲美町">稲美町</option>'+
            '<option value="小野市">小野市</option>'+
            '<option value="">加古川市</加古川市option>'+
            '<option value="加西市">加西市</option>'+
            '<option value="加東市">加東市</option>'+
            '<option value="神河町">神河町</option>'+
            '<option value="上郡町">上郡町</option>'+
            '<option value="香美町">香美町</option>'+
            '<option value="川西市">川西市</option>'+
            '<option value="神戸市">神戸市</option>'+
            '<option value="佐用町">佐用町</option>'+
            '<option value="三田市">三田市</option>'+
            '<option value="宍粟市">宍粟市</option>'+
            '<option value="新温泉町">新温泉町</option>'+
            '<option value="洲本市">洲本市</option>'+
            '<option value="太子町">太子町</option>'+
            '<option value="高砂市">高砂市</option>'+
            '<option value="多可町">多可町</option>'+
            '<option value="宝塚市">宝塚市</option>'+
            '<option value="たつの市">たつの市</option>'+
            '<option value="丹波篠山市">丹波篠山市</option>'+
            '<option value="丹波市">丹波市</option>'+
            '<option value="豊岡市">豊岡市</option>'+
            '<option value="西宮市">西宮市</option>'+
            '<option value="西脇市">西脇市</option>'+
            '<option value="播磨町">播磨町</option>'+
            '<option value="姫路市">姫路市</option>'+
            '<option value="福崎町">福崎町</option>'+
            '<option value="三木市">三木市</option>'+
            '<option value="南あわじ市">南あわじ市</option>'+
            '<option value="養父市">養父市</option>'+
        '</select>'+
    '</form>';

    Nara =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="明日香村">明日香村</option>'+
            '<option value="安堵町">安堵町</option>'+
            '<option value="斑鳩町">斑鳩町</option>'+
            '<option value="生駒市">生駒市</option>'+
            '<option value="宇陀市">宇陀市</option>'+
            '<option value="王寺町">王寺町</option>'+
            '<option value="大淀町">大淀町</option>'+
            '<option value="香芝市">香芝市</option>'+
            '<option value="橿原市">橿原市</option>'+
            '<option value="葛城市">葛城市</option>'+
            '<option value="上北山村">上北山村</option>'+
            '<option value="河合町">河合町</option>'+
            '<option value="川上村">川上村</option>'+
            '<option value="川西町">川西町</option>'+
            '<option value="上牧町">上牧町</option>'+
            '<option value="黒滝村">黒滝村</option>'+
            '<option value="広陵町">広陵町</option>'+
            '<option value="五條市">五條市</option>'+
            '<option value="御所市">御所市</option>'+
            '<option value="桜井市">桜井市</option>'+
            '<option value="三郷町">三郷町</option>'+
            '<option value="下市町">下市町</option>'+
            '<option value="下北山村">下北山村</option>'+
            '<option value="曽爾村">曽爾村</option>'+
            '<option value="高取町">高取町</option>'+
            '<option value="田原本町">田原本町</option>'+
            '<option value="天川村">天川村</option>'+
            '<option value="天理市">天理市</option>'+
            '<option value="十津川村">十津川村</option>'+
            '<option value="奈良市">奈良市</option>'+
            '<option value="野迫川村">野迫川村</option>'+
            '<option value="東吉野村">東吉野村</option>'+
            '<option value="平群町">平群町</option>'+
            '<option value="御杖村">御杖村</option>'+
            '<option value="三宅町">三宅町</option>'+
            '<option value="山添村">山添村</option>'+
            '<option value="大和郡山市">大和郡山市</option>'+
            '<option value="大和高田市">大和高田市</option>'+
            '<option value="吉野町">吉野町</option>'+
        '</select>'+
    '</form>';


    Wakayama =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="有田川町">有田川町</option>'+
            '<option value="有田市">有田市</option>'+
            '<option value="印南町">印南町</option>'+
            '<option value="岩出市">岩出市</option>'+
            '<option value="海南市">海南市</option>'+
            '<option value="かつらぎ町">かつらぎ町</option>'+
            '<option value="上富田町">上富田町</option>'+
            '<option value="北山村">北山村</option>'+
            '<option value="紀の川市">紀の川市</option>'+
            '<option value="紀美野町">紀美野町</option>'+
            '<option value="串本町">串本町</option>'+
            '<option value="九度山町">九度山町</option>'+
            '<option value="高野町">高野町</option>'+
            '<option value="古座川町">古座川町</option>'+
            '<option value="御坊市">御坊市</option>'+
            '<option value="白浜町">白浜町</option>'+
            '<option value="新宮市">新宮市</option>'+
            '<option value="すさみ町">すさみ町</option>'+
            '<option value="太地町">太地町</option>'+
            '<option value="田辺市">田辺市</option>'+
            '<option value="那智勝浦町">那智勝浦町</option>'+
            '<option value="橋本市">橋本市</option>'+
            '<option value="日高川町">日高川町</option>'+
            '<option value="日高町">日高町</option>'+
            '<option value="広川町">広川町</option>'+
            '<option value="みなべ町">みなべ町</option>'+
            '<option value="美浜町">美浜町</option>'+
            '<option value="湯浅町">湯浅町</option>'+
            '<option value="由良町">由良町</option>'+
            '<option value="和歌山市">和歌山市</option>'+
        '</select>'+
'</form>';

    Tottori =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="岩美町">岩美町</option>'+
            '<option value="倉吉市">倉吉市</option>'+
            '<option value="江府町">江府町</option>'+
            '<option value="琴浦町">琴浦町</option>'+
            '<option value="境港市">境港市</option>'+
            '<option value="大山町">大山町</option>'+
            '<option value="智頭町">智頭町</option>'+
            '<option value="鳥取市">鳥取市</option>'+
            '<option value="南部町">南部町</option>'+
            '<option value="日南町">日南町</option>'+
            '<option value="日吉津村">日吉津村</option>'+
            '<option value="日野町">日野町</option>'+
            '<option value="伯耆町><伯耆町/option>'+
            '<option value="北栄町">北栄町</option>'+
            '<option value="三朝町">三朝町</option>'+
            '<option value="八頭町">八頭町</option>'+
            '<option value="湯梨浜町">湯梨浜町</option>'+
            '<option value="米子市">米子市</option>'+
            '<option value="若桜町">若桜町</option>'+
        '</select>'+
    '</form>';

    Shimane =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="海士町">海士町</option>'+
            '<option value="飯南町">飯南町</option>'+
            '<option value="出雲市">出雲市</option>'+
            '<option value="雲南市">雲南市</option>'+
            '<option value="大田市">大田市</option>'+
            '<option value="邑南町">邑南町</option>'+
            '<option value="隠岐の島町">隠岐の島町</option>'+
            '<option value="奥出雲町">奥出雲町</option>'+
            '<option value="川本町">川本町</option>'+
            '<option value="江津市">江津市</option>'+
            '<option value="知夫村">知夫村</option>'+
            '<option value="津和野町">津和野町</option>'+
            '<option value="西ノ島町">西ノ島町</option>'+
            '<option value="浜田市">浜田市</option>'+
            '<option value="益田市">益田市</option>'+
            '<option value="松江市">松江市</option>'+
            '<option value="美郷町">美郷町</option>'+
            '<option value="安来市">安来市</option>'+
            '<option value="吉賀町">吉賀町</option>'+
        '</select>'+
    '</form>';

    Okayama =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="赤磐市">赤磐市</option>'+
            '<option value="浅口市">浅口市</option>'+
            '<option value="井原市">井原市</option>'+
            '<option value="岡山市">岡山市</option>'+
            '<option value="鏡野町">鏡野町</option>'+
            '<option value="笠岡市">笠岡市</option>'+
            '<option value="吉備中央町">吉備中央町</option>'+
            '<option value="久米南町">久米南町</option>'+
            '<option value="倉敷市">倉敷市</option>'+
            '<option value="里庄町">里庄町</option>'+
            '<option value="勝央町">勝央町</option>'+
            '<option value="新庄村">新庄村</option>'+
            '<option value="瀬戸内市">瀬戸内市</option>'+
            '<option value="総社市">総社市</option>'+
            '<option value="高梁市">高梁市</option>'+
            '<option value="玉野市">玉野市</option>'+
            '<option value="津山市">津山市</option>'+
            '<option value="奈義町">奈義町</option>'+
            '<option value="新見市">新見市</option>'+
            '<option value="西粟倉村">西粟倉村</option>'+
            '<option value="早島町">早島町</option>'+
            '<option value="備前市">備前市</option>'+
            '<option value="真庭市">真庭市</option>'+
            '<option value="美咲町">美咲町</option>'+
            '<option value="美作市">美作市</option>'+
            '<option value="矢掛町">矢掛町</option>'+
            '<option value="和気町">和気町</option>'+
        '</select>'+
    '</form>';

    Hiroshima =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="安芸太田町">安芸太田町</option>'+
            '<option value="安芸高田市">安芸高田市</option>'+
            '<option value="江田島市">江田島市</option>'+
            '<option value="大崎上島町">大崎上島町</option>'+
            '<option value="大竹市">大竹市</option>'+
            '<option value="尾道市">尾道市</option>'+
            '<option value="海田町">海田町</option>'+
            '<option value="北広島町">北広島町</option>'+
            '<option value="熊野町">熊野町</option>'+
            '<option value="呉市">呉市</option>'+
            '<option value="坂町">坂町</option>'+
            '<option value="庄原市">庄原市</option>'+
            '<option value="神石高原町">神石高原町</option>'+
            '<option value="世羅町">世羅町</option>'+
            '<option value="竹原市">竹原市</option>'+
            '<option value="廿日市市">廿日市市</option>'+
            '<option value="東広島市">東広島市</option>'+
            '<option value="広島市">広島市</option>'+
            '<option value="福山市">福山市</option>'+
            '<option value="府中市">府中市</option>'+
            '<option value="府中町">府中町</option>'+
            '<option value="三原市">三原市</option>'+
            '<option value="三次市">三次市</option>'+
        '</select>'+
    '</form>';

    Yamaguchi =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="阿武町">阿武町</option>'+
            '<option value="岩国市">岩国市</option>'+
            '<option value="宇部市">宇部市</option>'+
            '<option value="上関町">上関町</option>'+
            '<option value="下松市">下松市</option>'+
            '<option value="山陽小野田市">山陽小野田市</option>'+
            '<option value="下関市">下関市</option>'+
            '<option value="周南市">周南市</option>'+
            '<option value="周防大島町">周防大島町</option>'+
            '<option value="田布施町">田布施町</option>'+
            '<option value="長門市">長門市</option>'+
            '<option value="萩市">萩市</option>'+
            '<option value="光市">光市</option>'+
            '<option value="平生町">平生町</option>'+
            '<option value="防府市">防府市</option>'+
            '<option value="美祢市">美祢市</option>'+
            '<option value="柳井市">柳井市</option>'+
            '<option value="山口市"山口市></option>'+
            '<option value="和木町">和木町</option>'+
        '</select>'+
    '</form>';

    Tokushima =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="藍住町">藍住町</option>'+
            '<option value="阿南市">阿南市</option>'+
            '<option value="阿波市">阿波市</option>'+
            '<option value="石井町">石井町</option>'+
            '<option value="板野町">板野町</option>'+
            '<option value="海陽町">海陽町</option>'+
            '<option value="勝浦町">勝浦町</option>'+
            '<option value="上板町">上板町</option>'+
            '<option value="上勝町">上勝町</option>'+
            '<option value="神山町">神山町</option>'+
            '<option value="北島町">北島町</option>'+
            '<option value="小松島市">小松島市</option>'+
            '<option value="佐那河内村">佐那河内村</option>'+
            '<option value="つるぎ町">つるぎ町</option>'+
            '<option value="徳島市">徳島市</option>'+
            '<option value="那賀町">那賀町</option>'+
            '<option value="鳴門市">鳴門市</option>'+
            '<option value="東みよし町">東みよし町</option>'+
            '<option value="松茂町">松茂町</option>'+
            '<option value="美波町">美波町</option>'+
            '<option value="美馬市">美馬市</option>'+
            '<option value="三好市">三好市</option>'+
            '<option value="牟岐町">牟岐町</option>'+
            '<option value="吉野川市">吉野川市</option>'+
        '</select>'+
    '</form>';


    Kagawa =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="綾川町">綾川町</option>'+
            '<option value="宇多津町">宇多津町</option>'+
            '<option value="観音寺市">観音寺市</option>'+
            '<option value="琴平町">琴平町</option>'+
            '<option value="坂出市">坂出市</option>'+
            '<option value="さぬき市">さぬき市</option>'+
            '<option value="小豆島町">小豆島町</option>'+
            '<option value="善通寺市">善通寺市</option>'+
            '<option value="高松市">高松市</option>'+
            '<option value="多度津町">多度津町</option>'+
            '<option value="土庄町">土庄町</option>'+
            '<option value="直島町">直島町</option>'+
            '<option value="東かがわ市">東かがわ市</option>'+
            '<option value="丸亀市">丸亀市</option>'+
            '<option value="まんのう町">まんのう町</option>'+
            '<option value="三木町">三木町</option>'+
            '<option value="三豊市">三豊市</option>'+
        '</select>'+
    '</form>';

    Ehime =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="愛南町">愛南町</option>'+
            '<option value="伊方町">伊方町</option>'+
            '<option value="今治市">今治市</option>'+
            '<option value="伊予市">伊予市</option>'+
            '<option value="内子町">内子町</option>'+
            '<option value="宇和島市">宇和島市</option>'+
            '<option value="大洲市">大洲市</option>'+
            '<option value="上島町">上島町</option>'+
            '<option value="鬼北町">鬼北町</option>'+
            '<option value="久万高原町">久万高原町</option>'+
            '<option value="西条市">西条市</option>'+
            '<option value="四国中央市">四国中央市</option>'+
            '<option value="西予市">西予市</option>'+
            '<option value="東温市">東温市</option>'+
            '<option value="砥部町">砥部町</option>'+
            '<option value="新居浜市">新居浜市</option>'+
            '<option value="松前町">松前町</option>'+
            '<option value="松野町">松野町</option>'+
            '<option value="松山市">松山市</option>'+
            '<option value="八幡浜市">八幡浜市</option>'+
        '</select>'+
    '</form>';

    Kochi =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="安芸市">安芸市</option>'+
            '<option value="いの町">いの町</option>'+
            '<option value="馬路村">馬路村</option>'+
            '<option value="大川村">大川村</option>'+
            '<option value="大月町">大月町</option>'+
            '<option value="大豊町">大豊町</option>'+
            '<option value="越知町">越知町</option>'+
            '<option value="香美市">香美市</option>'+
            '<option value="北川村">北川村</option>'+
            '<option value="黒潮町">黒潮町</option>'+
            '<option value="芸西村">芸西村</option>'+
            '<option value="高知市">高知市</option>'+
            '<option value="香南市">香南市</option>'+
            '<option value="佐川町">佐川町</option>'+
            '<option value="四万十市">四万十市</option>'+
            '<option value="四万十町">四万十町</option>'+
            '<option value="宿毛市">宿毛市</option>'+
            '<option value="須崎市">須崎市</option>'+
            '<option value="田野町">田野町</option>'+
            '<option value="津野町">津野町</option>'+
            '<option value="東洋町">東洋町</option>'+
            '<option value="土佐市">土佐市</option>'+
            '<option value="土佐清水市">土佐清水市</option>'+
            '<option value="土佐町">土佐町</option>'+
            '<option value="中土佐町">中土佐町</option>'+
            '<option value="奈半利町">奈半利町</option>'+
            '<option value="南国市">南国市</option>'+
            '<option value="仁淀川町">仁淀川町</option>'+
            '<option value="日高村">日高村</option>'+
            '<option value="三原村">三原村</option>'+
            '<option value="室戸市">室戸市</option>'+
            '<option value="本山町">本山町</option>'+
            '<option value="安田町">安田町</option>'+
            '<option value="檮原町">檮原町</option>'+
        '</select>'+
    '</form>';

    Fukuoka =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="赤村">赤村</option>'+
            '<option value="朝倉市">朝倉市</option>'+
            '<option value="芦屋町">芦屋町</option>'+
            '<option value="飯塚市">飯塚市</option>'+
            '<option value="糸島市">糸島市</option>'+
            '<option value="糸田町">糸田町</option>'+
            '<option value="うきは市">うきは市</option>'+
            '<option value="宇美町">宇美町</option>'+
            '<option value="大川市><大川市/option>'+
            '<option value="大木町">大木町</option>'+
            '<option value="大任町">大任町</option>'+
            '<option value="大野城市">大野城市</option>'+
            '<option value="大牟田市">大牟田市</option>'+
            '<option value="岡垣町">岡垣町</option>'+
            '<option value="小郡市">小郡市</option>'+
            '<option value="遠賀町">遠賀町</option>'+
            '<option value="春日市">春日市</option>'+
            '<option value="粕屋町">粕屋町</option>'+
            '<option value="嘉麻市">嘉麻市</option>'+
            '<option value="川崎町">川崎町</option>'+
            '<option value="香春町">香春町</option>'+
            '<option value="苅田町">苅田町</option>'+
            '<option value="北九州市">北九州市</option>'+
            '<option value="鞍手町">鞍手町</option>'+
            '<option value="久留米市">久留米市</option>'+
            '<option value="桂川町">桂川町</option>'+
            '<option value="上毛町">上毛町</option>'+
            '<option value="古賀市">古賀市</option>'+
            '<option value="小竹町">小竹町</option>'+
            '<option value="篠栗町">篠栗町</option>'+
            '<option value="志免町">志免町</option>'+
            '<option value="新宮町">新宮町</option>'+
            '<option value="須恵町">須恵町</option>'+
            '<option value="添田町">添田町</option>'+
            '<option value="田川市">田川市</option>'+
            '<option value="太宰府市">太宰府市</option>'+
            '<option value="大刀洗町">大刀洗町</option>'+
            '<option value="筑後市">筑後市</option>'+
            '<option value="筑紫野市">筑紫野市</option>'+
            '<option value="築上町">築上町</option>'+
            '<option value="筑前町">筑前町</option>'+
            '<option value="東峰村">東峰村</option>'+
            '<option value="那珂川市">那珂川市</option>'+
            '<option value="中間市">中間市</option>'+
            '<option value="直方市">直方市</option>'+
            '<option value="久山町">久山町</option>'+
            '<option value="広川町">広川町</option>'+
            '<option value="福岡市">福岡市</option>'+
            '<option value="福智町"福智町></option>'+
            '<option value="福津市">福津市</option>'+
            '<option value="豊前市"豊前市></option>'+
            '<option value="水巻町">水巻町</option>'+
            '<option value="宮若市">宮若市</option>'+
            '<option value="みやこ町">みやこ町</option>'+
            '<option value="みやま市">みやま市</option>'+
            '<option value="宗像市">宗像市</option>'+
            '<option value="柳川市">柳川市</option>'+
            '<option value="八女市">八女市</option>'+
            '<option value="行橋市">行橋市</option>'+
            '<option value="吉富町">吉富町</option>'+
        '</select>'+
    '</form>';

    Saga =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="有田町">有田町</option>'+
            '<option value="伊万里市">伊万里市</option>'+
            '<option value="嬉野市">嬉野市</option>'+
            '<option value="大町町">大町町</option>'+
            '<option value="小城市">小城市</option>'+
            '<option value="鹿島市">鹿島市</option>'+
            '<option value="上峰町">上峰町</option>'+
            '<option value="唐津市">唐津市</option>'+
            '<option value="神埼市">神埼市</option>'+
            '<option value="基山町">基山町</option>'+
            '<option value="江北町">江北町</option>'+
            '<option value="佐賀市">佐賀市</option>'+
            '<option value="白石町">白石町</option>'+
            '<option value="多久市">多久市</option>'+
            '<option value="武雄市">武雄市</option>'+
            '<option value="太良町">太良町</option>'+
            '<option value="鳥栖市">鳥栖市</option>'+
            '<option value="みやき町">みやき町</option>'+
            '<option value="吉野ヶ里町">吉野ヶ里町</option>'+
        '</select>'+
    '</form>';

    Nagasaki =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="壱岐市">壱岐市</option>'+
            '<option value="諫早市">諫早市</option>'+
            '<option value="雲仙市">雲仙市</option>'+
            '<option value="大村市">大村市</option>'+
            '<option value="小値賀町">小値賀町</option>'+
            '<option value="川棚町">川棚町</option>'+
            '<option value="五島市">五島市</option>'+
            '<option value="西海市">西海市</option>'+
            '<option value="佐々町">佐々町</option>'+
            '<option value="佐世保市">佐世保市</option>'+
            '<option value="島原市">島原市</option>'+
            '<option value="新上五島町">新上五島町</option>'+
            '<option value="対馬市">対馬市</option>'+
            '<option value="時津町">時津町</option>'+
            '<option value="長崎市">長崎市</option>'+
            '<option value="長与町">長与町</option>'+
            '<option value="波佐見町">波佐見町</option>'+
            '<option value="東彼杵町">東彼杵町</option>'+
            '<option value="平戸市">平戸市</option>'+
            '<option value="松浦市">松浦市</option>'+
            '<option value="南島原市">南島原市</option>'+
        '</select>'+
    '</form>';

    Kumamoto =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="あさぎり町">あさぎり町</option>'+
            '<option value="芦北町">芦北町</option>'+
            '<option value="阿蘇市">阿蘇市</option>'+
            '<option value="天草市">天草市</option>'+
            '<option value="荒尾市">荒尾市</option>'+
            '<option value="五木村">五木村</option>'+
            '<option value="宇城市">宇城市</option>'+
            '<option value="宇土市">宇土市</option>'+
            '<option value="産山村">産山村</option>'+
            '<option value="大津町">大津町</option>'+
            '<option value="小国町">小国町</option>'+
            '<option value="嘉島町">嘉島町</option>'+
            '<option value="上天草市">上天草市</option>'+
            '<option value="菊池市">菊池市</option>'+
            '<option value="菊陽町">菊陽町</option>'+
            '<option value="玉東町">玉東町</option>'+
            '<option value="球磨村">球磨村</option>'+
            '<option value="熊本市">熊本市</option>'+
            '<option value="甲佐町">甲佐町</option>'+
            '<option value="合志市">合志市</option>'+
            '<option value="相良村">相良村</option>'+
            '<option value="高森町">高森町</option>'+
            '<option value="玉名市">玉名市</option>'+
            '<option value="多良木町">多良木町</option>'+
            '<option value="津奈木町">津奈木町</option>'+
            '<option value="長洲町">長洲町</option>'+
            '<option value="和水町">和水町</option>'+
            '<option value="南関町">南関町</option>'+
            '<option value="錦町">錦町</option>'+
            '<option value="西原村">西原村</option>'+
            '<option value="氷川町">氷川町</option>'+
            '<option value="人吉市">人吉市</option>'+
            '<option value="益城町">益城町</option>'+
            '<option value="美里町">美里町</option>'+
            '<option value="水上村">水上村</option>'+
            '<option value="水俣市">水俣市</option>'+
            '<option value="南阿蘇村">南阿蘇村</option>'+
            '<option value="南小国町">南小国町</option>'+
            '<option value="御船町">御船町</option>'+
            '<option value="八代市">八代市</option>'+
            '<option value="山江村">山江村</option>'+
            '<option value="山鹿市">山鹿市</option>'+
            '<option value="山都町">山都町</option>'+
            '<option value="湯前町">湯前町</option>'+
            '<option value="苓北町">苓北町</option>'+
        '</select>'+
    '</form>';

    Oita =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="宇佐市">宇佐市</option>'+
            '<option value="臼杵市">臼杵市</option>'+
            '<option value="大分市">大分市</option>'+
            '<option value="杵築市">杵築市</option>'+
            '<option value="玖珠町">玖珠町</option>'+
            '<option value="国東市">国東市</option>'+
            '<option value="九重町">九重町</option>'+
            '<option value="佐伯市">佐伯市</option>'+
            '<option value="竹田市">竹田市</option>'+
            '<option value="津久見市">津久見市</option>'+
            '<option value="中津市">中津市</option>'+
            '<option value="日出町">日出町</option>'+
            '<option value="日田市">日田市</option>'+
            '<option value="姫島村">姫島村</option>'+
            '<option value="豊後大野市">豊後大野市</option>'+
            '<option value="豊後高田市">豊後高田市</option>'+
            '<option value="別府市">別府市</option>'+
            '<option value="由布市">由布市</option>'+
        '</select>'+
    '</form>';

    Miyazaki =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="綾町">綾町</option>'+
            '<option value="えびの市">えびの市</option>'+
            '<option value="門川町">門川町</option>'+
            '<option value="川南町">川南町</option>'+
            '<option value="木城町">木城町</option>'+
            '<option value="串間市">串間市</option>'+
            '<option value="国富町">国富町</option>'+
            '<option value="五ヶ瀬町">五ヶ瀬町</option>'+
            '<option value="小林市">小林市</option>'+
            '<option value="西都市">西都市</option>'+
            '<option value="椎葉村">椎葉村</option>'+
            '<option value="新富町">新富町</option>'+
            '<option value="高千穂町">高千穂町</option>'+
            '<option value="高鍋町">高鍋町</option>'+
            '<option value="高原町">高原町</option>'+
            '<option value="都農町">都農町</option>'+
            '<option value="西米良村">西米良村</option>'+
            '<option value="日南市">日南市</option>'+
            '<option value="延岡市">延岡市</option>'+
            '<option value="日之影町">日之影町</option>'+
            '<option value="日向市">日向市</option>'+
            '<option value="美郷町">美郷町</option>'+
            '<option value="三股町">三股町</option>'+
            '<option value="都城市">都城市</option>'+
            '<option value="宮崎市">宮崎市</option>'+
            '<option value="諸塚村">諸塚村</option>'+
        '</select>'+
    '</form>';

    Kagoshima =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="姶良市">姶良市</option>'+
            '<option value="阿久根市">阿久根市</option>'+
            '<option value="天城町">天城町</option>'+
            '<option value="奄美市">奄美市</option>'+
            '<option value="伊佐市">伊佐市</option>'+
            '<option value="出水市">出水市</option>'+
            '<option value="伊仙町">伊仙町</option>'+
            '<option value="いちき串木野市">いちき串木野市</option>'+
            '<option value="指宿市">指宿市</option>'+
            '<option value="宇検村">宇検村</option>'+
            '<option value="大崎町">大崎町</option>'+
            '<option value="鹿児島市">鹿児島市</option>'+
            '<option value="鹿屋市">鹿屋市</option>'+
            '<option value="喜界町">喜界町</option>'+
            '<option value="肝付町">肝付町</option>'+
            '<option value="霧島市">霧島市</option>'+
            '<option value="錦江町">錦江町</option>'+
            '<option value="薩摩川内市">薩摩川内市</option>'+
            '<option value="さつま町">さつま町</option>'+
            '<option value="志布志市">志布志市</option>'+
            '<option value="瀬戸内町">瀬戸内町</option>'+
            '<option value="曽於市">曽於市</option>'+
            '<option value="龍郷町">龍郷町</option>'+
            '<option value="垂水市">垂水市</option>'+
            '<option value="知名町">知名町</option>'+
            '<option value="徳之島町">徳之島町</option>'+
            '<option value="十島村">十島村</option>'+
            '<option value="長島町">長島町</option>'+
            '<option value="中種子町">中種子町</option>'+
            '<option value="西之表市">西之表市</option>'+
            '<option value="日置市">日置市</option>'+
            '<option value="東串良町">東串良町</option>'+
            '<option value="枕崎市">枕崎市</option>'+
            '<option value="三島村">三島村</option>'+
            '<option value="南大隅町">南大隅町</option>'+
            '<option value="南九州市">南九州市</option>'+
            '<option value="南さつま市">南さつま市</option>'+
            '<option value="南種子町">南種子町</option>'+
            '<option value="屋久島町">屋久島町</option>'+
            '<option value="大和村">大和村</option>'+
            '<option value="湧水町">湧水町</option>'+
            '<option value="与論町">与論町</option>'+
            '<option value="和泊町">和泊町</option>'+
        '</select>'+
    '</form>';

    Okinawa =
    '<form id="submit_form" method="get" action="area_searches">'+
        '<select class="form-control" name="search">'+
            '<option value="未選択">未選択</option>'+
            '<option value="粟国村">粟国村</option>'+
            '<option value="伊江村">伊江村</option>'+
            '<option value="石垣市">石垣市</option>'+
            '<option value="伊是名村">伊是名村</option>'+
            '<option value="糸満市">糸満市</option>'+
            '<option value="伊平屋村">伊平屋村</option>'+
            '<option value="浦添市">浦添市</option>'+
            '<option value="うるま市">うるま市</option>'+
            '<option value="大宜味村">大宜味村</option>'+
            '<option value="沖縄市">沖縄市</option>'+
            '<option value="恩納村">恩納村</option>'+
            '<option value="嘉手納町">嘉手納町</option>'+
            '<option value="北大東村">北大東村</option>'+
            '<option value="北中城村">北中城村</option>'+
            '<option value="宜野座村">宜野座村</option>'+
            '<option value="宜野湾市">宜野湾市</option>'+
            '<option value="金武町">金武町</option>'+
            '<option value="国頭村">国頭村</option>'+
            '<option value="久米島町">久米島町</option>'+
            '<option value="座間味村">座間味村</option>'+
            '<option value="竹富町">竹富町</option>'+
            '<option value="多良間村">多良間村</option>'+
            '<option value="北谷町">北谷町</option>'+
            '<option value="渡嘉敷村">渡嘉敷村</option>'+
            '<option value="渡名喜村">渡名喜村</option>'+
            '<option value="豊見城市">豊見城市</option>'+
            '<option value="中城村">中城村</option>'+
            '<option value="今帰仁村">今帰仁村</option>'+
            '<option value="名護市">名護市</option>'+
            '<option value="那覇市">那覇市</option>'+
            '<option value="南城市">南城市</option>'+
            '<option value="西原町">西原町</option>'+
            '<option value="南風原町">南風原町</option>'+
            '<option value="東村">東村</option>'+
            '<option value="南大東村">南大東村</option>'+
            '<option value="宮古島市">宮古島市</option>'+
            '<option value="本部町">本部町</option>'+
            '<option value="八重瀬町">八重瀬町</option>'+
            '<option value="与那国町">与那国町</option>'+
            '<option value="与那原町">与那原町</option>'+
            '<option value="読谷村">読谷村</option>'+
        '</select>'+
    '</form>';

    $city.empty();
    if(area === '北海道'){
        $city.append(Hokkaido);
    }else if(area === '青森県'){
        $city.append(Aomori);
    }else if(area === '岩手県'){
        $city.append(Iwate);
    }else if(area === '宮城県'){
        $city.append(Miyagi);
    }else if(area === '秋田県'){
        $city.append(Akita);
    }else if(area === '山形県'){
        $city.append(Yamagata);
    }else if(area === '福島県'){
        $city.append(Fukushima);
    }else if(area === '茨城県'){
        $city.append(Ibaraki);
    }else if(area === '栃木県'){
        $city.append(Ibaraki);
    }else if(area === '群馬県'){
        $city.append(Gunma);
    }else if(area === '埼玉県'){
        $city.append(Saitama);
    }else if(area === '千葉県'){
        $city.append(Chiba);
    }else if(area === '東京都'){
        $city.append(Tokyo);
    }else if(area === '神奈川県'){
        $city.append(Kanagawa);
    }else if(area === '新潟県'){
        $city.append(Niigata);
    }else if(area === '富山県'){
        $city.append(Toyama);
    }else if(area === '石川県'){
        $city.append(Ishikawa);
    }else if(area === '福井県'){
        $city.append(Fukui);
    }else if(area === '山梨県'){
        $city.append(Yamanashi);
    }else if(area === '長野県'){
        $city.append(Nagano);
    }else if(area === '岐阜県'){
        $city.append(Gifu);
    }else if(area === '静岡県'){
        $city.append(Shizuoka);
    }else if(area === '愛知県'){
        $city.append(Aichi);
    }else if(area === '三重県'){
        $city.append(Mie);
    }else if(area === '滋賀県'){
        $city.append(Shiga);
    }else if(area === '京都府'){
        $city.append(Kyoto);
    }else if(area === '大阪府'){
        $city.append(Osaka);
    }else if(area === '兵庫県'){
        $city.append(Hyogo);
    }else if(area === '奈良県'){
        $city.append(Nara);
    }else if(area === '和歌山県'){
        $city.append(Wakayama);
    }else if(area === '鳥取県'){
        $city.append(Tottori);
    }else if(area === '島根県'){
        $city.append(Shimane);
    }else if(area === '岡山県'){
        $city.append(Okayama);
    }else if(area === '広島県'){
        $city.append(Hiroshima);
    }else if(area === '山口県'){
        $city.append(Yamaguchi);
    }else if(area === '香川県'){
        $city.append(Kagawa);
    }else if(area === '愛媛県'){
        $city.append(Ehime);
    }else if(area === '高知県'){
        $city.append(Kochi);
    }else if(area === '福岡県'){
        $city.append(Fukuoka);
    }else if(area === '佐賀県'){
        $city.append(Saga);
    }else if(area === '長崎県'){
        $city.append(Nagasaki);
    }else if(area === '熊本県'){
        $city.append(Kumamoto);
    }else if(area === '大分県'){
        $city.append(Oita);
    }else if(area === '宮崎県'){
        $city.append(Miyazaki);
    }else if(area === '鹿児島県'){
        $city.append(Kagoshima);
    }else{
        $city.append(Okinawa);
    }
});