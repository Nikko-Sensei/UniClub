<div class="max-w-7xl mx-auto px-4 md:px-6 py-8 w-full">


    <!-- Header -->

    <div class="mb-8">


        <p class="text-sm font-semibold text-blue-600 mb-1.5">

            UniClub Support

        </p>



        <h1 class="text-3xl md:text-4xl font-bold text-slate-800">

            Contact Us

        </h1>



        <p class="text-slate-500 mt-2">

            Send us a message and we will help you with
            clubs, events, and your UniClub experience.

        </p>


    </div>




    <!-- CONTACT GRID -->


    <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 mt-8">



        <!-- FORM -->


        <div class="lg:col-span-3
                    bg-white
                    rounded-2xl
                    shadow-sm
                    border border-gray-100
                    p-6 md:p-8">


            <h2 class="text-xl font-bold text-gray-800">

                Send us a message

            </h2>


            <p class="text-sm text-gray-500 mt-1">

                Tell us how we can help with clubs,
                events, or your UniClub experience.

            </p>



            <form method="POST" action="/contact/send" class="mt-6 space-y-5">


                <!-- Name -->


                <div>


                    <label class="text-sm font-semibold text-gray-700 block">

                        Full Name

                    </label>


                    <input type="text" name="name" required class="mt-1.5
                               w-full
                               rounded-xl
                               border-gray-200
                               border
                               bg-gray-50/50
                               px-4 py-3
                               text-sm
                               focus:border-blue-500
                               focus:ring-2
                               focus:ring-blue-200
                               transition">


                </div>





                <!-- Email -->


                <div>


                    <label class="text-sm font-semibold text-gray-700 block">

                        Student Email

                    </label>


                    <input type="email" name="email" required class="mt-1.5
                               w-full
                               rounded-xl
                               border-gray-200
                               border
                               bg-gray-50/50
                               px-4 py-3
                               text-sm
                               focus:border-blue-500
                               focus:ring-2
                               focus:ring-blue-200
                               transition">


                </div>





                <!-- Subject -->


                <div>


                    <label class="text-sm font-semibold text-gray-700 block">

                        Topic

                    </label>


                    <select name="subject" class="mt-1.5
                               w-full
                               rounded-xl
                               border-gray-200
                               border
                               bg-gray-50/50
                               px-4 py-3
                               text-sm
                               focus:border-blue-500
                               focus:ring-2
                               focus:ring-blue-200">


                        <option>
                            Club Registration Inquiry
                        </option>


                        <option>
                            Event Support
                        </option>


                        <option>
                            General Feedback
                        </option>


                        <option>
                            Technical Support
                        </option>


                    </select>


                </div>





                <!-- Message -->


                <div>


                    <label class="text-sm font-semibold text-gray-700 block">

                        Your Message

                    </label>


                    <textarea name="message" rows="4" required placeholder="Tell us how we can help..." class="mt-1.5
                               w-full
                               rounded-xl
                               border-gray-200
                               border
                               bg-gray-50/50
                               px-4 py-3
                               text-sm
                               focus:border-blue-500
                               focus:ring-2
                               focus:ring-blue-200"></textarea>


                </div>





                <!-- Button -->


                <button type="submit" class="w-full
                           bg-blue-700
                           hover:bg-blue-800
                           text-white
                           font-semibold
                           py-3.5
                           rounded-xl
                           transition
                           shadow-md
                           shadow-blue-200/50">


                    Send Message


                </button>


            </form>


        </div>







        <!-- CONTACT INFO -->


        <div class="lg:col-span-2
                    bg-white
                    rounded-2xl
                    shadow-sm
                    border border-gray-100
                    p-6 md:p-8">


            <h3 class="text-lg font-bold text-gray-800 mb-6">

                Get in touch

            </h3>




            <div class="space-y-6">



                <!-- Address -->


                <div class="flex gap-4">


                    <div class="w-11 h-11
                                rounded-xl
                                bg-blue-50
                                flex
                                items-center
                                justify-center
                                text-blue-600
                                flex-shrink-0">


                        <i data-lucide="map-pin" class="w-5 h-5"></i>


                    </div>



                    <div>


                        <p class="text-xs font-semibold
                                  text-gray-400
                                  uppercase
                                  tracking-wider">

                            Address

                        </p>


                        <p class="text-gray-800 font-medium">

                            Computer University

                        </p>


                        <p class="text-sm text-gray-500">

                            Yangon, Myanmar

                        </p>


                    </div>


                </div>







                <!-- Hours -->


                <div class="flex gap-4">


                    <div class="w-11 h-11
                                rounded-xl
                                bg-blue-50
                                flex
                                items-center
                                justify-center
                                text-blue-600
                                flex-shrink-0">


                        <i data-lucide="clock" class="w-5 h-5"></i>


                    </div>



                    <div>


                        <p class="text-xs font-semibold
                                  text-gray-400
                                  uppercase
                                  tracking-wider">

                            Hours

                        </p>


                        <p class="text-gray-800 font-medium">

                            Mon-Fri: 9:00 AM - 5:00 PM

                        </p>


                        <p class="text-sm text-gray-500">

                            Sat-Sun: Closed

                        </p>


                    </div>


                </div>







                <!-- Email -->


                <div class="flex gap-4">


                    <div class="w-11 h-11
                                rounded-xl
                                bg-blue-50
                                flex
                                items-center
                                justify-center
                                text-blue-600
                                flex-shrink-0">


                        <i data-lucide="mail" class="w-5 h-5"></i>


                    </div>



                    <div>


                        <p class="text-xs font-semibold
                                  text-gray-400
                                  uppercase
                                  tracking-wider">

                            Email

                        </p>


                        <p class="text-blue-700 font-medium">

                            support@uniclub.com

                        </p>


                    </div>


                </div>







                <!-- Phone -->


                <div class="flex gap-4">


                    <div class="w-11 h-11
                                rounded-xl
                                bg-blue-50
                                flex
                                items-center
                                justify-center
                                text-blue-600
                                flex-shrink-0">


                        <i data-lucide="phone" class="w-5 h-5"></i>


                    </div>



                    <div>


                        <p class="text-xs font-semibold
                                  text-gray-400
                                  uppercase
                                  tracking-wider">

                            Phone

                        </p>


                        <p class="text-blue-700 font-medium">

                            +95 9 XXX XXX XXX

                        </p>


                    </div>


                </div>


            </div>


        </div>


    </div>







    <!-- FAQ -->


    <div class="mt-8 bg-gray-50
                rounded-2xl
                p-8 md:p-12
                text-center
                border border-gray-200">


        <h2 class="text-2xl md:text-3xl font-bold text-gray-800">

            Need a quick answer?

        </h2>


        <p class="text-gray-600 mt-2 max-w-md mx-auto">

            Check our frequently asked questions
            about clubs, events, and memberships.

        </p>




        <button class="mt-6
                   inline-flex
                   items-center
                   gap-2
                   border-2
                   border-blue-700
                   text-blue-700
                   hover:bg-blue-700
                   hover:text-white
                   font-semibold
                   px-8
                   py-3
                   rounded-full
                   transition">


            Browse FAQ


            <i data-lucide="arrow-right" class="w-4 h-4"></i>


        </button>


    </div>



</div>