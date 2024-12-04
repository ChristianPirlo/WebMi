const userIdInput = document.getElementById('user-id');
const roleIdElement = document.getElementById('role-id');

const users = {
  '1': 'superadmin',
  '2': 'unit',
  '3': 'viewer',
  // Add more users and roles here
};

userIdInput.addEventListener('input', (e) => {
  const userId = e.target.value;

  if (users[userId]) {
    const roleId = users[userId];
    roleIdElement.textContent = `Role: ${roleId}`;

    // Perform different actions based on the role
    switch (roleId) {
      case 'superadmin':
        // Redirect to admin dashboard
        window.location.href = '/superadmin-home';
        break;
      case 'unit':
        // Redirect to moderator dashboard
        window.location.href = '/unit-home2';
        break;
      case 'viewer':
        // Redirect to user dashboard
        window.location.href = '/viewer-home3';
        break;
      default:
        // Handle unknown role
        roleIdElement.textContent = 'Unknown role';
    }
  } else {
    roleIdElement.textContent = 'User  not found';
  }
});
