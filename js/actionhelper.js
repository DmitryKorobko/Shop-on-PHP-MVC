function deleting(user_id)
{
    if (confirm("Are you sure?"))
    {
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

function editing()
{
    alert('Editing for this user is saving!');
    window.location='/admin/users';
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