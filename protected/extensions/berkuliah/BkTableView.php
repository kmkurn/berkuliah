<?php

/**
 * BkTableView displays a list of data items in a grid-like view.
 * 
 * @author Kemal Maulana Kurniawan <kemskems12@gmail.com>
 */
class BkTableView extends BkListView
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