function deleting(user_id)
{
        if (confirm("Are you sure?")) {
            window.location = '/admin/deleteuser/' + user_id;
            window.location = '/admin/users';
            return true;
        }
}

function adding()
{
    alert('User is added!');
    window.location='/admin/users';
    return true;
}

