@extends('layouts.app')

@section('css')
    
body {
  background-color: #979797;
  color: #fff;
  margin: 0;
  padding: 0;}

.page {
  max-width: 640px;
  margin: 0 auto 30px auto;}

.panel {
  background-color: #fff;
  color: #666;
  box-shadow: 3px 4px 5px rgba(0, 0, 0, 0.2);
  overflow: auto;}

button {
  border: none;}

/********** LOGO **********/
h1 {
  text-align: center;
  width: 200px;
  height: 100px;
  margin: 40px auto 40px auto;
  background-image: url('../img/logo.png');
  background-repeat: no-repeat;
  text-indent: 100%;
  white-space: nowrap;
  overflow: hidden;}

/********** TYPOGRAPHY **********/


h2, h3 {
  font-weight: normal;
  margin: 0;}
h2 {
  color: #666;
  text-transform: uppercase;
  letter-spacing: 0.14em;
  font-size: 230%;
  line-height: 1em;
  padding: 20px 0 0 20px;}
h3 {
  font-size: 90%;
  letter-spacing: 0.2em;}



a {
    text-decoration: none;}

button {
  font-size: 90%;
  text-align: left;
  text-transform: uppercase;}

  /*****************  No JS ***************/
#billboard {text-align: center;}
.js-warning {display: none;}

.no-js .js-warning {
  display: block;
  border: 3px solid #fff;
  text-align: center;
  background-color: #fff;
  color: #db5391;
  padding: 10px;}
  
  /********** TABS **********/
.tab-list {
  margin: 0;
  padding: 0;}

.tab-list li {
  display: inline-block;
  list-style-type: none;
  background-color: #303030;
  border-bottom: 3px solid #858585;
  font-family: 'Grandstander', cursive;
  text-transform: uppercase;
  letter-spacing: 0.2em;}

.tab-list li a {
  color: #f2f2f2;
  display: block;
  padding: 3px 10px 3px 10px;}


/********** HOVER STATES **********/
.tab-list li.active, .tab-list li.hover {
  background-color: #e5e5e5;
  border-bottom: 3px solid #e5e5e5;}

.tab-list li.active a, .tab-list li a:hover {
  color: #666;
  background-color: #e5e5e5;}


/********** PANELS **********/
.tab-panel {
  display: none;
  background-color: #e5e5e5;
  color: #666;
  min-height: 150px;
  overflow: auto;}

.tab-panel.active {
  display: block;}

.tab-panel p {
  margin: 20px;}
@endsection

@section('content')

    <section class="page">

        <div class="tabs">

            <ul class="tab-list">
                <li class="active"><a class="tab-control" href="#tab-1"><h3>AVERAGE</h3></a></li>
                <li><a class="tab-control" href="#tab-2"><h3>SUBJECTS</h3></a></li>
                <li><a class="tab-control" href="#tab-3"><h3>COMPARE</h3></a></li>
                <li><a class="tab-control" href="#tab-4"><h3>Find Me</h3></a></li>
            </ul>

            <div class="tab-panel active" id="tab-1">
                <p>If you pressed home , you will move to the main screen which holds students ordered by thier average
                in all subjects (without couting failed ones) , and students are seperated into sections gathering
                students who failed in the same number of subjects , in top of the table there is a button to change
                calculating method of the average (count failed subjects as 60). 
                </p>
            </div>

            <div class="tab-panel" id="tab-2">
                <p>In footer , there is Subject element which leads to page holds subjects to choose or not,
                then when you finish selecting subject , the same home page shows students but with average
                of the selected subjects.
                </p>
            </div>

            <div class="tab-panel" id="tab-3">
                <p>In footer also , there is Compare element , this button leads you to the page you can
                insert two ids of two student to compare , it has a bunch of properties to compare two
                student by. in one row you can add number to calculate the number of subjects that both of student
                have succeed with mark more than what you inputed,
                in another row you can select a subject to see both student marks in.
                </p>
            </div>

            <div class="tab-panel" id="tab-4">
                <p>In footer also , there is Find Me element , this will lead you to a page you must insert your
                id and then analyze your self with some statistics.
                </p>
            </div>
        </div><!-- .tabs -->

    </section><!-- .page -->

    <script src="/MARKS5/resources/js/jquery.min.js"> 
      
    </script>
    <script>
      $('.tab-list').each(function(){                     // Find lists of tabs
          var $this = $(this);                            // Store this list
          var $tab = $this.find('li.active');             // Get the active list item
          var $link = $tab.find('a');                     // Get link from active tab
          var $panel = $($link.attr('href'));             // Get active panel

          $this.on('click', '.tab-control', function(e) { // When click on a tab
              e.preventDefault();                           // Prevent link behavior
              var $link = $(this),                          // Store the current link
                  id = this.hash;                           // Get href of clicked tab 

              if (id && !$link.is('.active')) {             // If not currently active
              $panel.removeClass('active');               // Make panel inactive
              $tab.removeClass('active');                 // Make tab inactive

              $panel = $(id).addClass('active');          // Make new panel active
              $tab = $link.parent().addClass('active');   // Make new tab active 
              }
          });
      });
    </script>

  </body>

@endsection