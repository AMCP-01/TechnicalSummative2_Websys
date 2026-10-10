<h1>Edit Customer</h1>

<form action="<?= site_url('index.php/customer/update/' . $customer['id']) ?>"
      method="post"
      enctype="multipart/form-data">

    <label>Full Name</label>
    <input type="text"
           name="full_name"
           value="<?= esc($customer['full_name']) ?>">

    <label>Email</label>
    <input type="email"
           name="email"
           value="<?= esc($customer['email']) ?>">

    <label>Phone</label>
    <input type="text"
           name="phone"
           value="<?= esc($customer['phone']) ?>">
           
    <label>Profile Picture</label>
    <input type="file"
           name="avatar"
           accept=".jpg,.jpeg,.png">

    <button type="submit">Update Customer</button>
</form>
