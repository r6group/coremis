# Yii2 jqPlot Widget

Виджет jqPlot (http://www.jqplot.com) позволяет рисовать графики в ваших проектах на Yii2. Немаловажным фактором в выборе именно jpPlot стала поддержка логарифмической шкалы (что просто необходимо при построении графика абонентского трафика за учетный период).

# Скриншоты

![ScreenShot](https://raw.githubusercontent.com/vakorovin/yii2-jqplot-widget/master/screenshots/basicline.png)

![ScreenShot](https://raw.githubusercontent.com/vakorovin/yii2-jqplot-widget/master/screenshots/2.png)

### Установка

В корне вашего проекта в composer.json в раздел "require" пропишите:

    "vakorovin/yii2-jqplot-widget": "dev-master"

и после выполните команду:

    php composer.phar install

Или же выполните команду:

    php composer.phar require --prefer-dist vakorovin/yii2-jqplot-widget "dev-master"

### Пример использования

    use vakorovin\yii2_jqplot_widget\JqPlotWidget;

    $data=[
        [1,4,56,7,8,9,0,45,45],
        [0=>12,1=>44,2=>6,3=>45,4=>2,5=>134,6=>44,7=>4,8=>16],
    ];

    echo JqPlotWidget::widget([
        'data'=>$data,
        'htmlOptions'=>[
            'id'=>'day_traffic',
            'style'=>'width: 100%; height: 300px;',
        ],
        'jqplotOptions'=>[
            'title'=>'Traffic',
            'seriesColors'=>["#ff0044", "#0044ff"]
        ],
    ]);

Ознакомиться с параметрами настройки плагина можно на сайте автора: http://www.jqplot.com/docs/files/jqPlotOptions-txt.html
