<div id="sidebar" class="col-md-3">
    <div class="widget widget_category">
        <ul>
            <? if (isset($cat_model)): ?>
                <? foreach ($cat_model as $cat): ?>
                    <li class='parent_cat'>
                        <a href="/catalog/<?= $cat['link'] ?>"><?= $cat['name'] ?></a>
                        <ul>
                            <? foreach ($allitem_model as $item): ?>
                                <? if ($item->cat_id == $cat['id']): ?>
                                    <li class='chld_cat'><a
                                            href="/catalog/<?= $cat['link'] ?>/<?= $item->id ?>"><?= $item->name ?></a>
                                    </li>
                                <? endif ?>
                            <? endforeach ?>
                        </ul>
                    </li>
                <? endforeach ?>
            <? endif ?>
        </ul>
    </div>
</div>