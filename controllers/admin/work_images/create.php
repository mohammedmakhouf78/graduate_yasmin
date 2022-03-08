<?php
include __DIR__ . "/../../../functions/functions.php";
if (isset($_POST['work_id'])) {

    $work_id = $_POST['work_id'];

    $data = [];
    foreach($_FILES['image'] as $key => $image)
    {
        foreach($image as $index => $value)
        {
            if($key == "name")
            {
                $data[$index]['name'] = $value;
            }
            else if($key == "type")
            {
                $data[$index]['type'] = $value;
            }
            else if($key == "tmp_name")
            {
                $data[$index]['tmp_name'] = $value;
            }
        }
    }

    foreach($data as $image)
    {
        $image = uploadImageArray($image,"work_images","work_image");
        if($image == false)
        {
            addErrorToSession('image', 'Error In Uploading The image');
            redirect(getPage("work_images/create.php"));
        }
        else
        {
            $data = [
                'image' => $image,
                'work_id' => $work_id
            ];
        
            $result = insert($conn, "work_images", $data);
        }
    }

    
    if ($result) {
        addSuccessToSession('db', "Work_image Inserted Successfully");
    } else {
        addErrorToSession('db', "There was an error sorry!!!");
    }
    redirect(getPage("work_images/create.php"));
} else {
    redirect(getPage("work_images/create.php"));
}
