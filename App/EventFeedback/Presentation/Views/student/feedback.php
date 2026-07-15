<div class="bg-white rounded-xl border border-slate-200 p-6">


    <h1 class="text-xl font-bold text-slate-800">
        Event Feedback
    </h1>


    <form method="POST">


        <div class="mt-5">

            <label class="text-sm font-medium text-slate-600">
                Rating
            </label>


            <select name="rating" class="w-full mt-2 rounded-lg border border-slate-300 px-4 py-2">


                <option value="5">
                    ⭐⭐⭐⭐⭐ Excellent
                </option>

                <option value="4">
                    ⭐⭐⭐⭐ Good
                </option>

                <option value="3">
                    ⭐⭐⭐ Average
                </option>

                <option value="2">
                    ⭐⭐ Poor
                </option>

                <option value="1">
                    ⭐ Bad
                </option>


            </select>

        </div>



        <div class="mt-5">


            <label class="text-sm font-medium text-slate-600">
                Comment
            </label>


            <textarea name="comment" rows="4" class="w-full mt-2 rounded-lg border border-slate-300 px-4 py-2"
                placeholder="Share your experience..."></textarea>


        </div>



        <button class="mt-5 px-5 py-2.5 bg-blue-600 text-white rounded-lg">

            Submit Feedback

        </button>


    </form>


</div>