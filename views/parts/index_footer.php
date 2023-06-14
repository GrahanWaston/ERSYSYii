<div class="card-footer d-md-flex justify-content-between align-items-center">
    <div class="mb-2 m-md-0 p-md-0 text-center">
        <?= \jeemce\helpers\WidgetHelper::providerSummary($dataProvider) ?>
    </div>
    <?= \jeemce\helpers\TwbsHelper::linkPagerClass()::widget([
        'pagination' => $dataProvider->pagination,
        'options' => ['class' => 'm-0 p-0'],
        'listOptions' => ['class' => 'pagination m-0 p-0 justify-content-center'],
    ]) ?>
</div>