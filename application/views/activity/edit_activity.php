<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index">Asistencia Social</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li ><a href="../../index">Inicio</a></li>
        <li class="active"><a href="../../activity">Actividad</a></li>
        <li ><a href="../../volunteers">Voluntarios</a></li>
        <li><a href="../../pantry">Despensa</a></li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Áreas <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Salud</a></li>
            <li><a href="#">Educación</a></li>
            <li><a href="#">Carcelario</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

<div class="container theme-showcase" role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>Actividad</h1>
    <p>Asistencia Social</p>
  </div>

  <div class="page-header">
    <h2>Editar actividad</h2>
  </div>
  <div class="row">
    <div class="col-xl-12">
     
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Editar actividad</h3>
        </div>
        <div class="panel-body">
          
 
<?php foreach ($activity_item as $activity_data): ?>
<?php echo validation_errors(); ?>
<?php echo form_open('activity/edit_activity/'.$activity_data['idActivity'].''); ?>
    <input type="hidden" name="idActivity" value="<?php echo set_value('idActivity',$activity_data['idActivity']); ?>" />
    
    <div class="form-group row">
      <div class="col-xs-3">
        <label for="activity_date_label">Fecha</label>
        <input class="form-control" type="input" name="activity_date" placeholder="" value="<?php echo set_value('activity_date',$activity_data['activity_date']); ?>" />
      </div>

      <div class="col-xs-6">  
        <label for="activity_description_label">Descripción</label>
        <input class="form-control" id="ex3" type="input" name="activity_description" value="<?php echo set_value('activity_description',$activity_data['activity_description']); ?>" />
      </div>
    </div>  
    <div class="form-group row">
      <div class="col-xs-3">
        <label for="activity_category_label">Categoría</label>
        <?php $category_options= $categories; echo form_dropdown('activity_category',$category_options,$activity_data['activity_category'],'class="form-control"'); ?><br />
        
      </div>
      <div class="col-xs-3">
        <label for="activity_subcategory_label">Subcategoría</label>
        <?php $category_options= $subcategories; echo form_dropdown('activity_subcategory',$category_options,$activity_data['activity_subcategory'],'class="form-control"'); ?><br />
      </div>

      <div class="col-xs-3">  
        <label for="activity_amount_label">Cantidad</label>
        <input class="form-control" type="input" name="activity_amount" value="<?php echo set_value('activity_amount',$activity_data['activity_amount']); ?>"/>
      </div>
    </div>  
  <?php endforeach; ?>


        <input type="submit" name="submit" value="Guardar" class="btn btn-primary"/>
  

</form>

        </div>
      </div>
    </div><!-- /.col-sm-4 -->
    


  


</div> <!-- /container -->

