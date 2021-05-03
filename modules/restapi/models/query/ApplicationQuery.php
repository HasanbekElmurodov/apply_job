<?php

namespace app\modules\restapi\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\restapi\models\Application]].
 *
 * @see \app\modules\restapi\models\Application
 */
class ApplicationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\modules\restapi\models\Application[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\restapi\models\Application|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
