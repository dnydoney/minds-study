<?php
	//前台
	$tongzizhe = new Secretary();
	
	//看股票的同事
	$tongshi1 = new StockObserver("01", $tongzizhe);
	$tongshi2 = new StockObserver("02", $tongzizhe);

	//前台记录同事
	$tongzizhe->Attach($tongshi1);
	$tongzizhe->Attach($tongshi2);

	//发现敌情
	$tongzizhe->SetAction("敌情来了");
	//通知各位战友
	$tongzizhe->Notify();
