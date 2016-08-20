
<form action="" method="post" class="main_settings  add">
    <h1>Add new section</h1>
    <label>section name</label>
    <input type="text" name="section_name" placeholder="please sections title">
    <p>
    <label>section status</label>
    <select name="section_statues">
        <option value="active">active</option>
        <option value="disactive">disactive</option>
    </select>
    </p>
    <p>
    <label>section location</label>
    <select name="section_location">
        <option value="side">side</option>
        <option value="body">body</option>
    </select>
    </p>
    <label>section descraption</label>
    <textarea name="section_desc" placeholder="please write section description !!!! " ></textarea>
    
    <input class="btn-primary  btn-lg" type="submit" name="submit" value="add">
    
</form>