<?php
   $mealBuilder = new MealBuilder();

   $vegMeal = $mealBuilder->prepareVegMeal();
   $vegMeal->showItems();

   $nonVegMeal = $mealBuilder->prepareNonVegMeal();
   $nonVegMeal->showItems();
