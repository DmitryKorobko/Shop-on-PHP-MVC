function deletingUser(user_id)
{
    if (confirm("Are you sure?"))
    {
        window.location = '/admin/deleteuser/' + user_id;
        window.location = '/admin/users';
        return true;
    }
}

function addingUser()
{
    alert('User is added!');
    window.location='/admin/users';
    return true;
}

function editingUser()
{
    alert('Editing for this user is saving!');
    window.location='/admin/users';
    return true;
}

function deletingOrder(order_id)
{
    if (confirm("Are you sure?"))
    {
        window.location = '/admin/deleteorder/' + order_id;
        window.location = '/admin/orders';
        return true;
    }
}

function addingOrder()
{
    alert('Order is added!');
    window.location='/admin/orders';
    return true;
}

function editingOrder()
{
    alert('Editing for this order is saving!');
    window.location='/admin/orders';
    return true;
}

function deletingProduct(product_sku)
{
    if (confirm("Are you sure?"))
    {
        window.location = '/admin/deleteproduct/' + product_sku;
        window.location = '/admin/products';
        return true;
    }
}

function addingProduct()
{
    alert('Product is added!');
    window.location='/admin/products';
    return true;
}

function editingProduct()
{
    alert('Editing for this product is saving!');
    window.location='/admin/products';
    return true;
}

function searchSkills(str)
{
    var skills = ['PHP', 'CSS', 'Javascript', 'Java', 'HTML', 'Web-design'];
    var skillsOfUser = str.split(',');
    skills.forEach(function(item) {
        skillsOfUser.forEach(function (path) {
            if (item == path)
            {
                $("select option[value=" + item.toLowerCase() + "]").prop("selected", true);
            }
        });
    });
}

function searchRoleId(role)
{
    $("select option[value=" + role + "]").prop("selected", true);
}