<?php
/**
 * BkListView class file.
 *
 * @author Kemal Maulana Kurniawan <kemskems12@gmail.com>
 */

/**
 * BkListView displays a list of data items in a list view with Indonesian messages.
 * 
 * @author Kemal Maulana Kurniawan <kemskems12@gmail.com>
 * @package ext.berkuliah
 */
Yii::import('zii.widgets.CListView');

class BkListView extends CListView
{
	/**
	 * The item name.
	 * @var string
	 */
	public $itemName;

	/**
	 * Sets default item name to 'hasil'.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->itemName = 'hasil';
	}

	/**
	 * Sets pager and summary text configuration.
	 */
	public function init()
	{
		parent::init();

		$this->pager = array(
			'header'=>'',
			'firstPageLabel'=>'Awal',
			'lastPageLabel'=>'Akhir',
			'nextPageLabel'=>'Sesudah >',
			'prevPageLabel'=>'< Sebelum',
			'maxButtonCount'=>5,
		);

		$this->summaryText = 'Menampilkan {start}-{end} dari {count} ' . $this->itemName;
	}
}