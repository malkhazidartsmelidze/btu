<form action="/testrequestpost" method="post">
    @csrf
    <input type="text" name="name" value="TESTNAME">
    <input type="text" name="lastname" value="TESTLASTNAME">
    <input type="text" name="age" value="23">
    <input type="text" name="gender" value="m">
    <input type="text" name="weight" value="90">
    <input type="text" name="height" value="190">

    <select name="select" id="">
        <option value="opt1">Option 1</option>
        <option value="opt2" selected="">Option 2</option>
    </select>

    <button>Submit</button>
</form>
