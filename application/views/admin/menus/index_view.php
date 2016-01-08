<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- Single button -->
            <?php
            echo anchor('admin/menus/create','Add menu','class="btn btn-primary"');
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12" style="margin-top: 10px;">
            <?php
            echo '<table class="table table-hover table-bordered table-condensed">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Menu title</th>';
            echo '<th>Operations</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            if(!empty($menus))
            {
                foreach($menus as $key => $menu)
                {
                    echo '<tr>';
                    echo '<td>'.$key.'</td><td>'.anchor('admin/menus/items/'.$key,$menu['title']).'</td>';
                    echo '<td>';
                    echo anchor('admin/menus/edit/'.$key,'<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>');
                    echo ' '.anchor('admin/menus/delete/'.$key,'<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>','onclick="return confirm(\'Are you sure you want to delete?\')"');
                    echo '</tr>';
                }
            }
            echo '</tbody>';
            echo '</table>';

            ?>
        </div>
    </div>
</div>