<h1>Add recepe form</h1>
<form method="POST" name="addRecepeForm" enctype="multipart/form-data">

  <input type="hidden" name="_token" value="{{ csrf_token() }}" />

  <label for="recepeName">Recepe Name:</label>
  <input type="text" id="recepeName" name="recepeName" required>
  <br>

  <label for="preperation_time">Preperation time:</label>
  <input type="text" id="preperationTime" name="preperationTime" required>
  <br>

  <label for="text">Recepe Description:</label>
  <textarea id="text" name="text" rows="4" required></textarea>
  <br>

  <div id="errorContainer" class="error"></div>

  <input type="submit" value="Submit">
</form>