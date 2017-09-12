<?php
function csv_to_array($filename='', $delimiter=',')
{
    if(!file_exists($filename) || !is_readable($filename))
        return FALSE;

    $header = NULL;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
        {
            if(!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }
    return $data;
}


$csv =  csv_to_array('missing_images.csv', ',');

// echo '<pre>';
// print_r($csv);

foreach ($csv as $key => $value) {
	$data['sku'] = $value['sku'];
	$data['product_image'] = $value['product_image']."01.jpg";
	$final_data[] =  $data;
}

// echo '<pre>';
// print_r($final_data);



if(createCSV($final_data, 'nav-product-image.csv')){
    echo 'Successfully Created file ';
}

function createCSV($data, $filename)
{

    /**
    * @path we can change path like $path ='/var/www/html/try/export'
    */
    $path = dirname(__FILE__);

    $fp = fopen($path.'/'.$filename, 'w+');
    $first = true;
            foreach ($data as $key => $values) {
                if($first)
                {
                    fputcsv($fp, array_keys($values));
                }
                $first=false;
               
                	fputcsv($fp, array_values($values));     	
            }
        
    fclose($fp);    
    return true;
}

?> 