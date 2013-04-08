<?php
/**
 * BkTableView class file.
 *
 * @author Kemal Maulana Kurniawan <kemskems12@gmail.com>
 * @link 
 * @copyright 
 * @license 
 */

Yii::import('zii.widgets.CListView');

/**
 * BkTableView displays a list of data items in a grid-like view.
 *
 * Unlike {@link CGridView} which displays the data items in a table with rows representing the data
 * and the columns representing the attributes of the data, BkTableView displays each information about
 * a data as a table entry.
 *
 * BkTableView supports everything that is supported by CListView since this class is a subclass of CListView.
 *
 * The minimal code needed to use BkTableView is as follows:
 *
 * <pre>
 * $dataProvider=new CActiveDataProvider('Post');
 *
 * $this->widget('ext.widgets.berkuliah.BkTableView', array(
 *     'dataProvider'=>$dataProvider,
 *     'itemView'=>'_post',   // refers to the partial view named '_post'
 *     'sortableAttributes'=>array(
 *         'title',
 *         'create_time'=>'Post Time',
 *     ),
 *     'numColumns'=>3,
 * ));
 * </pre>
 *
 * The above code first creates a data provider for the <code>Post</code> ActiveRecord class.
 * It then uses BkTableView to display every data item as returned by the data provider in a table with 3 columns.
 * The display is done via the partial view named '_post'. This partial view will be rendered
 * once for every data item. In the view, one can access the current data item via variable <code>$data</code>.
 * For more details, see {@link itemView}.
 *
 * 
 * @author Kemal Maulana Kurniawan <kemskems12@gmail.com>
 * @package ext.widgets.berkuliah
 */
class BkTableView extends CListView
{
	/**
	 * The number of columns
	 * @var int
	 */
	public $numColumns;
	/**
	 * CSS class name for each row
	 * @var string
	 */
	public $rowCssClass;
	/**
	 * CSS class name for each data in a row
	 * @var string
	 */
	public $dataCssClass;
	
	/**
	 * Initializes the tag name.
	 * This method will initialize "itemsTagName" property to "table".
	 */
	public function init()
	{
		parent::init();
		if ($this->numColumns === null)
			throw new CException('The property "numColumns" cannot be empty.');
			
		$this->itemsTagName = 'table';
	}

	/**
	 * Renders the data item list. This method overrides {@link renderItems()} of {@link CListView}
	 */
	public function renderItems()
	{
		echo CHtml::openTag($this->itemsTagName,array('class'=>$this->itemsCssClass))."\n";
	    $data=$this->dataProvider->getData();
	    if(($n=count($data))>0)
	    {
	        $owner=$this->getOwner();
	        $viewFile=$owner->getViewFile($this->itemView);
	        $j=0;
	        foreach($data as $i=>$item)
	        {
	        	if ($j % $this->numColumns == 0)
	        		echo CHtml::openTag('tr', array('class' => $this->rowCssClass)) . "\n";
	            $data=$this->viewData;
	            $data['index']=$i;
	            $data['data']=$item;
	            $data['widget']=$this;
	            echo CHtml::openTag('td', array('class' => $this->dataCssClass)) . "\n";
	            $owner->renderFile($viewFile,$data);
	            echo CHtml::closeTag('td') . "\n";
	            if ($j % $this->numColumns == ($this->numColumns-1) || $j == $n-1)
	            	echo CHtml::closeTag('tr') . "\n";
	            $j++;
	        }
	    }
	    else
	        $this->renderEmptyText();
	    echo CHtml::closeTag($this->itemsTagName);
	}
}