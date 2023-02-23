<div>
    <form method="POST">
        @csrf
        @method('PUT')
        <div class="mb-2">
            <label for="one">One</label>
            <input type="text" name="one" class="bg-gray-100 border-2 w-full p-2 rounded">
        </div>
        <div class="mb-2">
            <label for="two">Two</label>
            <input type="text" name="two" class="bg-gray-100 border-2 w-full p-2 rounded">
        </div>
        <div class="mb-2">
            <label for="three">Three</label>
            <input type="text" name="three" class="bg-gray-100 border-2 w-full p-2 rounded">
        </div>
        <div class="mb-2">
            <label for="four">Four</label>
            <input type="text" name="four" class="bg-gray-100 border-2 w-full p-2 rounded">
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Update</button>
        </div>
    </form>
</div>
