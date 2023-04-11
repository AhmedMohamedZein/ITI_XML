<?php
function add_employee()
{

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];



    $doc = new DOMDocument();
    $doc->formatOutput = true;
    $doc->load("employee.xml");
    $rootcompany = $doc->getElementsByTagName("company")->item(0);

    //employee
    $employee = $doc->createElement("employee");
    //name
    $name = $doc->createElement("name", $name);
    //email
    $email = $doc->createElement("email", $email);
    //phone
    $phones = $doc->createElement("phones");
    $phone = $doc->createElement("phone", $phone);
    $phone->setAttribute("type", "mobile");
    $phones->appendChild($phone);
    //address
    $addresses = $doc->createElement("addresses");
    $address = $doc->createElement("street", $address);
    $addresses->appendChild($address);


    //append
    $employee->appendChild($name);
    $employee->appendChild($email);
    $employee->appendChild($phones);
    $employee->appendChild($addresses);



    $rootcompany->appendChild($employee);
    // nextindex();

    $doc->save("employee.xml");
}

function get_employees_number()
{
    $doc = new DOMDocument();
    $doc->formatOutput = true;
    $doc->load("employee.xml");
    $allemployees = $doc->getElementsByTagName("employee");
    // var_dump($allemployees);
    return $allemployees->length - 1;
}




function session_set()
{
    if (!isset($_SESSION['index']))
        $_SESSION['index'] = 0;
}

function nextindex()
{
    $index = $_SESSION['index'];

    // var_dump($index);
    if ($index < get_employees_number()) {
        $newindex = ++$index;
        $_SESSION['index'] = $newindex;
    }

    if ($index == get_employees_number()) {
        $newindex = 0;
        $_SESSION['index'] = $newindex;
    }
    // return $index;
}

function previousindex()
{
    $index = $_SESSION['index'];
    // var_dump($index);
    if ($index == 0) {
        $newindex = get_employees_number();
    } else {
        $newindex = --$index;
    }
    $_SESSION['index'] = $newindex;
    // return $index;
}

function deleteNode()
{
    $doc = new DOMDocument();
    $doc->formatOutput = true;
    $doc->load("employee.xml");
    $employee = $doc->getElementsByTagName('employee')->item($_SESSION['index']);
    // var_dump($employee);
    $doc->documentElement->removeChild($employee);
    previousindex();
    $doc->save("employee.xml");
}

function update_employee()
{
    $doc = new DOMDocument();
    $doc->formatOutput = true;
    $doc->load("employee.xml");

    $doc->getElementsByTagName("name")->item($_SESSION['index'])->textContent = $_POST['name'];
    //  echo $Allemployee->length
    // echo $Allemployee->item(0)->firstChild->tagName;
    $doc->getElementsByTagName("email")->item($_SESSION['index'])->textContent = $_POST['email'];
    $doc->getElementsByTagName("street")->item($_SESSION['index'])->textContent = $_POST['address'];
    $doc->getElementsByTagName("phone")->item($_SESSION['index'])->textContent = $_POST['phone'];
    $doc->save("employee.xml");
}



// foreach ($variable->child as $value) {
//     $value->name
// }