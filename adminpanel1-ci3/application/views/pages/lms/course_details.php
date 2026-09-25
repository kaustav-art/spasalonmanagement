<div class="app-content-wrapper py-20 pb-13">
                <div class="container ">
                    <div class="page-header pb-7 d-flex justify-content-between align-items-center gap-6 flex-wrap">
                        <div class="">
                            <h2 class="fw-semibold fs-7">Course Details</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Course Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div> <!-- breadcrumb end -->

                    <div class="page-content">
                        <div class="p-4 card-bg rounded-md shadow-custom mb-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="bg-gray py-10 px-6 mb-5 rounded-md">
                                        <div class="mb-4">
                                            <span class="badge badge-label-success">Design</span>
                                        </div>
                                        <h3 class=" fw-medium fs-9 mb-8">
                                            Beginner Adobe Illustrator <br> for Graphic Design
                                        </h3>
                                        <div class="d-flex align-items-center gap-12 flex-wrap">
                                            <!-- instructor -->
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="avatar  avatar-md rounded-pill">
                                                    <img src="<?= base_url('assets/'); ?>img/avatar/11.jpg" alt="conca">
                                                </div>
                                                <div class="">
                                                    <span class="fw-medium">Instructor</span>
                                                    <h4 class="fs-4">Skly Herd</h4>
                                                </div>
                                            </div>
                                            <div class="">
                                                <span class="fw-medium">Category</span>
                                                <h4 class="fs-4">Graphic Design</h4>
                                            </div>
                                            <div class="">
                                                <span class="fw-medium">Last updated </span>
                                                <h4 class="fs-4">July 4, 2025</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <nav id="course-content" class="navbar card-bg border rounded-md px-3 mb-3 position-sticky top-10 z-9">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#about">About</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#curriculum">Curriculum</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#instructor">Instructor</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#reviews">Reviews</a>
                                            </li>
                                        </ul>
                                    </nav>

                                    <div data-bs-spy="scroll" data-bs-target="#course-content" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="bg-body-tertiary p-3 rounded-2 mb-10" tabindex="0">
                                        <div id="about" class="mb-10">
                                            <h3 class="h4 mb-5">About Course</h3>
                                            <p>This course is aimed at people interested in UI/UX Design. We’ll start from the very
                                                beginning and work all the way through, step by step. If you already have some UI/UX
                                                Design experience but want to get up to speed using Adobe XD then this course is perfect
                                                for you too!</p>

                                            <p>First, we will go over the differences between UX and UI Design. We will look at what our
                                                brief for this real-world project is, then we will learn about low-fidelity wireframes and how
                                                to make use of existing UI design kits.</p>

                                            <div class="mt-6">
                                                <h4>What will you Learn?</h4>
                                                <div class="tp-course-details-2-list">
                                                    <ul>
                                                        <li>Become a UX designer.</li>
                                                        <li>Filming 101</li>
                                                        <li>Learn to design websites.</li>
                                                        <li>Tools you need for best results.</li>
                                                        <li>How to plan for a video idea</li>
                                                        <li>How to use premade UI kits.</li>
                                                        <li>Differences between ads, trailers, vlogs,etc</li>
                                                    </ul>
                                                    <p>With this course, you also have access to a whole lot of resources not only for reference but
                                                        also free media like aerial video shots, background music, fonts, and more.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="curriculum" class="mb-10">
                                            <h3 class="h4 mb-5">Course Curriculum</h3>

                                            <div class="accordion" id="accordionExample">
                                                <!-- Lesson 1 -->
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#lessonOne" aria-expanded="true" aria-controls="lessonOne">
                                                            Introduction to Web Development
                                                        </button>
                                                    </h2>
                                                    <div id="lessonOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body d-flex flex-column gap-5">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                                                <div class="left d-flex align-items-center gap-2">
                                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M6.67773 9.00041V7.81641C6.67773 6.28841 7.75773 5.67241 9.07773 6.43241L10.1017 7.02441L11.1257 7.61641C12.4457 8.37641 12.4457 9.62441 11.1257 10.3844L10.1017 10.9764L9.07773 11.5684C7.75773 12.3284 6.67773 11.7044 6.67773 10.1844V9.00041Z" stroke="#4F5158" stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                    <span><b>Video:</b> Welcome & Overview</span>
                                                                </div>
                                                                <div class="right d-flex align-items-center flex-wrap gap-3">
                                                                    <span>10 min</span>
                                                                    <span class="badge badge-label-primary rounded-pill">
                                                                        <a href="#" class="text-decoration-none d-inline-flex align-items-center gap-1">
                                                                            <svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M14.6808 4.83159C14.8936 5.13001 15 5.27922 15 5.5001C15 5.72097 14.8936 5.87018 14.6808 6.16861C13.7245 7.50949 11.2825 10.4001 8 10.4001C4.71755 10.4001 2.27547 7.50949 1.31923 6.16861C1.10641 5.87018 1 5.72097 1 5.5001C1 5.27922 1.10641 5.13001 1.31923 4.83159C2.27547 3.49071 4.71754 0.600098 8 0.600098C11.2825 0.600098 13.7245 3.49071 14.6808 4.83159Z" stroke="#5169F1" stroke-width="1.2"></path>
                                                                                <path d="M10.0999 5.49985C10.0999 4.34005 9.1597 3.39985 7.9999 3.39985C6.8401 3.39985 5.8999 4.34005 5.8999 5.49985C5.8999 6.65965 6.8401 7.59985 7.9999 7.59985C9.1597 7.59985 10.0999 6.65965 10.0999 5.49985Z" stroke="#5169F1" stroke-width="1.2"></path>
                                                                            </svg> Preview
                                                                        </a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                                                <div class="left d-flex align-items-center gap-2">
                                                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 7.4C1 4.38301 1 2.87452 1.99584 1.93726C2.99167 1 4.59445 1 7.8 1H8.41818C11.0271 1 12.3316 1 13.2375 1.63827C13.4971 1.82114 13.7275 2.03802 13.9218 2.28231C14.6 3.13494 14.6 4.36269 14.6 6.81818V8.85455C14.6 11.2251 14.6 12.4104 14.2249 13.357C13.6217 14.8789 12.3463 16.0793 10.7293 16.6469C9.7235 17 8.46415 17 5.94545 17C4.5062 17 3.78657 17 3.21182 16.7982C2.28783 16.4739 1.559 15.7879 1.21437 14.9183C1 14.3773 1 13.7 1 12.3455V7.4Z" stroke="#4F5158" stroke-width="1.2" stroke-linejoin="round"></path>
                                                                        <path d="M14.6016 9C14.6016 10.4728 13.4077 11.6667 11.9349 11.6667C11.4023 11.6667 10.7743 11.5733 10.2565 11.7121C9.79635 11.8354 9.43695 12.1948 9.31366 12.6549C9.1749 13.1728 9.26823 13.8007 9.26823 14.3333C9.26823 15.8061 8.07432 17 6.60156 17" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M4.60156 5H10.2016" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M4.60156 8.2002H7.00156" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                    <span><b>Reading:</b> Getting Started Guide</span>
                                                                </div>
                                                                <div class="right d-flex align-items-center flex-wrap gap-3">
                                                                    <span>5 min</span>
                                                                    <span><svg width="14" height="18" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M15.4 9H2.6C1.71634 9 1 9.71634 1 10.6V20.2C1 21.0837 1.71634 21.8 2.6 21.8H15.4C16.2837 21.8 17 21.0837 17 20.2V10.6C17 9.71634 16.2837 9 15.4 9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M14.6 9.00001V6.6C14.6 5.11479 14.01 3.69041 12.9598 2.6402C11.9096 1.59 10.4852 1 9.00003 1C7.51481 1 6.09043 1.59 5.04023 2.6402C3.99002 3.69041 3.40002 5.11479 3.40002 6.6V9.00001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M9.00004 16.2C9.44187 16.2 9.80004 15.8418 9.80004 15.4C9.80004 14.9581 9.44187 14.6 9.00004 14.6C8.55821 14.6 8.20004 14.9581 8.20004 15.4C8.20004 15.8418 8.55821 16.2 9.00004 16.2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Lesson 2 -->
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#lessonTwo" aria-expanded="false" aria-controls="lessonTwo">
                                                            HTML Basics
                                                        </button>
                                                    </h2>
                                                    <div id="lessonTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body d-flex flex-column gap-5">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                                                <div class="left d-flex align-items-center gap-2">
                                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M6.67773 9.00041V7.81641C6.67773 6.28841 7.75773 5.67241 9.07773 6.43241L10.1017 7.02441L11.1257 7.61641C12.4457 8.37641 12.4457 9.62441 11.1257 10.3844L10.1017 10.9764L9.07773 11.5684C7.75773 12.3284 6.67773 11.7044 6.67773 10.1844V9.00041Z" stroke="#4F5158" stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                    <span><b>Video:</b> Structure of a Web Page</span>
                                                                </div>
                                                                <div class="right d-flex align-items-center flex-wrap gap-3">
                                                                    <span>15 min</span>
                                                                    <span><svg width="14" height="18" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M15.4 9H2.6C1.71634 9 1 9.71634 1 10.6V20.2C1 21.0837 1.71634 21.8 2.6 21.8H15.4C16.2837 21.8 17 21.0837 17 20.2V10.6C17 9.71634 16.2837 9 15.4 9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M14.6 9.00001V6.6C14.6 5.11479 14.01 3.69041 12.9598 2.6402C11.9096 1.59 10.4852 1 9.00003 1C7.51481 1 6.09043 1.59 5.04023 2.6402C3.99002 3.69041 3.40002 5.11479 3.40002 6.6V9.00001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M9.00004 16.2C9.44187 16.2 9.80004 15.8418 9.80004 15.4C9.80004 14.9581 9.44187 14.6 9.00004 14.6C8.55821 14.6 8.20004 14.9581 8.20004 15.4C8.20004 15.8418 8.55821 16.2 9.00004 16.2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg></span>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                                                <div class="left d-flex align-items-center gap-2">
                                                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 7.4C1 4.38301 1 2.87452 1.99584 1.93726C2.99167 1 4.59445 1 7.8 1H8.41818C11.0271 1 12.3316 1 13.2375 1.63827C13.4971 1.82114 13.7275 2.03802 13.9218 2.28231C14.6 3.13494 14.6 4.36269 14.6 6.81818V8.85455C14.6 11.2251 14.6 12.4104 14.2249 13.357C13.6217 14.8789 12.3463 16.0793 10.7293 16.6469C9.7235 17 8.46415 17 5.94545 17C4.5062 17 3.78657 17 3.21182 16.7982C2.28783 16.4739 1.559 15.7879 1.21437 14.9183C1 14.3773 1 13.7 1 12.3455V7.4Z" stroke="#4F5158" stroke-width="1.2" stroke-linejoin="round"></path>
                                                                        <path d="M14.6016 9C14.6016 10.4728 13.4077 11.6667 11.9349 11.6667C11.4023 11.6667 10.7743 11.5733 10.2565 11.7121C9.79635 11.8354 9.43695 12.1948 9.31366 12.6549C9.1749 13.1728 9.26823 13.8007 9.26823 14.3333C9.26823 15.8061 8.07432 17 6.60156 17" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M4.60156 5H10.2016" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M4.60156 8.2002H7.00156" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                    <span><b>Reading:</b> HTML Tags Explained</span>
                                                                </div>
                                                                <div class="right d-flex align-items-center flex-wrap gap-3">
                                                                    <span>8 min</span>
                                                                    <span><svg width="14" height="18" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M15.4 9H2.6C1.71634 9 1 9.71634 1 10.6V20.2C1 21.0837 1.71634 21.8 2.6 21.8H15.4C16.2837 21.8 17 21.0837 17 20.2V10.6C17 9.71634 16.2837 9 15.4 9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M14.6 9.00001V6.6C14.6 5.11479 14.01 3.69041 12.9598 2.6402C11.9096 1.59 10.4852 1 9.00003 1C7.51481 1 6.09043 1.59 5.04023 2.6402C3.99002 3.69041 3.40002 5.11479 3.40002 6.6V9.00001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M9.00004 16.2C9.44187 16.2 9.80004 15.8418 9.80004 15.4C9.80004 14.9581 9.44187 14.6 9.00004 14.6C8.55821 14.6 8.20004 14.9581 8.20004 15.4C8.20004 15.8418 8.55821 16.2 9.00004 16.2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Lesson 3 -->
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#lessonThree" aria-expanded="false" aria-controls="lessonThree">
                                                            CSS Fundamentals
                                                        </button>
                                                    </h2>
                                                    <div id="lessonThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body d-flex flex-column gap-5">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                                                <div class="left d-flex align-items-center gap-2">
                                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M6.67773 9.00041V7.81641C6.67773 6.28841 7.75773 5.67241 9.07773 6.43241L10.1017 7.02441L11.1257 7.61641C12.4457 8.37641 12.4457 9.62441 11.1257 10.3844L10.1017 10.9764L9.07773 11.5684C7.75773 12.3284 6.67773 11.7044 6.67773 10.1844V9.00041Z" stroke="#4F5158" stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                    <span><b>Video:</b> Styling Basics</span>
                                                                </div>
                                                                <div class="right d-flex align-items-center flex-wrap gap-3">
                                                                    <span>12 min</span>
                                                                    <span><svg width="14" height="18" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M15.4 9H2.6C1.71634 9 1 9.71634 1 10.6V20.2C1 21.0837 1.71634 21.8 2.6 21.8H15.4C16.2837 21.8 17 21.0837 17 20.2V10.6C17 9.71634 16.2837 9 15.4 9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M14.6 9.00001V6.6C14.6 5.11479 14.01 3.69041 12.9598 2.6402C11.9096 1.59 10.4852 1 9.00003 1C7.51481 1 6.09043 1.59 5.04023 2.6402C3.99002 3.69041 3.40002 5.11479 3.40002 6.6V9.00001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M9.00004 16.2C9.44187 16.2 9.80004 15.8418 9.80004 15.4C9.80004 14.9581 9.44187 14.6 9.00004 14.6C8.55821 14.6 8.20004 14.9581 8.20004 15.4C8.20004 15.8418 8.55821 16.2 9.00004 16.2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg></span>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                                                <div class="left d-flex align-items-center gap-2">
                                                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 7.4C1 4.38301 1 2.87452 1.99584 1.93726C2.99167 1 4.59445 1 7.8 1H8.41818C11.0271 1 12.3316 1 13.2375 1.63827C13.4971 1.82114 13.7275 2.03802 13.9218 2.28231C14.6 3.13494 14.6 4.36269 14.6 6.81818V8.85455C14.6 11.2251 14.6 12.4104 14.2249 13.357C13.6217 14.8789 12.3463 16.0793 10.7293 16.6469C9.7235 17 8.46415 17 5.94545 17C4.5062 17 3.78657 17 3.21182 16.7982C2.28783 16.4739 1.559 15.7879 1.21437 14.9183C1 14.3773 1 13.7 1 12.3455V7.4Z" stroke="#4F5158" stroke-width="1.2" stroke-linejoin="round"></path>
                                                                        <path d="M14.6016 9C14.6016 10.4728 13.4077 11.6667 11.9349 11.6667C11.4023 11.6667 10.7743 11.5733 10.2565 11.7121C9.79635 11.8354 9.43695 12.1948 9.31366 12.6549C9.1749 13.1728 9.26823 13.8007 9.26823 14.3333C9.26823 15.8061 8.07432 17 6.60156 17" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M4.60156 5H10.2016" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M4.60156 8.2002H7.00156" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                    <span><b>Reading:</b> CSS Selectors</span>
                                                                </div>
                                                                <div class="right d-flex align-items-center flex-wrap gap-3">
                                                                    <span>7 min</span>
                                                                    <span><svg width="14" height="18" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M15.4 9H2.6C1.71634 9 1 9.71634 1 10.6V20.2C1 21.0837 1.71634 21.8 2.6 21.8H15.4C16.2837 21.8 17 21.0837 17 20.2V10.6C17 9.71634 16.2837 9 15.4 9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M14.6 9.00001V6.6C14.6 5.11479 14.01 3.69041 12.9598 2.6402C11.9096 1.59 10.4852 1 9.00003 1C7.51481 1 6.09043 1.59 5.04023 2.6402C3.99002 3.69041 3.40002 5.11479 3.40002 6.6V9.00001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M9.00004 16.2C9.44187 16.2 9.80004 15.8418 9.80004 15.4C9.80004 14.9581 9.44187 14.6 9.00004 14.6C8.55821 14.6 8.20004 14.9581 8.20004 15.4C8.20004 15.8418 8.55821 16.2 9.00004 16.2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Lesson 4 -->
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#lessonFour" aria-expanded="false" aria-controls="lessonFour">
                                                            JavaScript Essentials
                                                        </button>
                                                    </h2>
                                                    <div id="lessonFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body d-flex flex-column gap-5">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                                                <div class="left d-flex align-items-center gap-2">
                                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M6.67773 9.00041V7.81641C6.67773 6.28841 7.75773 5.67241 9.07773 6.43241L10.1017 7.02441L11.1257 7.61641C12.4457 8.37641 12.4457 9.62441 11.1257 10.3844L10.1017 10.9764L9.07773 11.5684C7.75773 12.3284 6.67773 11.7044 6.67773 10.1844V9.00041Z" stroke="#4F5158" stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                    <span><b>Video:</b> Intro to JS</span>
                                                                </div>
                                                                <div class="right d-flex align-items-center flex-wrap gap-3">
                                                                    <span>18 min</span>
                                                                    <span><svg width="14" height="18" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M15.4 9H2.6C1.71634 9 1 9.71634 1 10.6V20.2C1 21.0837 1.71634 21.8 2.6 21.8H15.4C16.2837 21.8 17 21.0837 17 20.2V10.6C17 9.71634 16.2837 9 15.4 9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M14.6 9.00001V6.6C14.6 5.11479 14.01 3.69041 12.9598 2.6402C11.9096 1.59 10.4852 1 9.00003 1C7.51481 1 6.09043 1.59 5.04023 2.6402C3.99002 3.69041 3.40002 5.11479 3.40002 6.6V9.00001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M9.00004 16.2C9.44187 16.2 9.80004 15.8418 9.80004 15.4C9.80004 14.9581 9.44187 14.6 9.00004 14.6C8.55821 14.6 8.20004 14.9581 8.20004 15.4C8.20004 15.8418 8.55821 16.2 9.00004 16.2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg></span>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                                                <div class="left d-flex align-items-center gap-2">
                                                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 7.4C1 4.38301 1 2.87452 1.99584 1.93726C2.99167 1 4.59445 1 7.8 1H8.41818C11.0271 1 12.3316 1 13.2375 1.63827C13.4971 1.82114 13.7275 2.03802 13.9218 2.28231C14.6 3.13494 14.6 4.36269 14.6 6.81818V8.85455C14.6 11.2251 14.6 12.4104 14.2249 13.357C13.6217 14.8789 12.3463 16.0793 10.7293 16.6469C9.7235 17 8.46415 17 5.94545 17C4.5062 17 3.78657 17 3.21182 16.7982C2.28783 16.4739 1.559 15.7879 1.21437 14.9183C1 14.3773 1 13.7 1 12.3455V7.4Z" stroke="#4F5158" stroke-width="1.2" stroke-linejoin="round"></path>
                                                                        <path d="M14.6016 9C14.6016 10.4728 13.4077 11.6667 11.9349 11.6667C11.4023 11.6667 10.7743 11.5733 10.2565 11.7121C9.79635 11.8354 9.43695 12.1948 9.31366 12.6549C9.1749 13.1728 9.26823 13.8007 9.26823 14.3333C9.26823 15.8061 8.07432 17 6.60156 17" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M4.60156 5H10.2016" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M4.60156 8.2002H7.00156" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                    <span><b>Reading:</b> Variables & Data Types</span>
                                                                </div>
                                                                <div class="right d-flex align-items-center flex-wrap gap-3">
                                                                    <span>9 min</span>
                                                                    <span><svg width="14" height="18" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M15.4 9H2.6C1.71634 9 1 9.71634 1 10.6V20.2C1 21.0837 1.71634 21.8 2.6 21.8H15.4C16.2837 21.8 17 21.0837 17 20.2V10.6C17 9.71634 16.2837 9 15.4 9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M14.6 9.00001V6.6C14.6 5.11479 14.01 3.69041 12.9598 2.6402C11.9096 1.59 10.4852 1 9.00003 1C7.51481 1 6.09043 1.59 5.04023 2.6402C3.99002 3.69041 3.40002 5.11479 3.40002 6.6V9.00001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M9.00004 16.2C9.44187 16.2 9.80004 15.8418 9.80004 15.4C9.80004 14.9581 9.44187 14.6 9.00004 14.6C8.55821 14.6 8.20004 14.9581 8.20004 15.4C8.20004 15.8418 8.55821 16.2 9.00004 16.2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Lesson 5 -->
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#lessonFive" aria-expanded="false" aria-controls="lessonFive">
                                                            Working with the DOM
                                                        </button>
                                                    </h2>
                                                    <div id="lessonFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body d-flex flex-column gap-5">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                                                <div class="left d-flex align-items-center gap-2">
                                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M6.67773 9.00041V7.81641C6.67773 6.28841 7.75773 5.67241 9.07773 6.43241L10.1017 7.02441L11.1257 7.61641C12.4457 8.37641 12.4457 9.62441 11.1257 10.3844L10.1017 10.9764L9.07773 11.5684C7.75773 12.3284 6.67773 11.7044 6.67773 10.1844V9.00041Z" stroke="#4F5158" stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                    <span><b>Video:</b> DOM Manipulation</span>
                                                                </div>
                                                                <div class="right d-flex align-items-center flex-wrap gap-3">
                                                                    <span>14 min</span>
                                                                    <span><svg width="14" height="18" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M15.4 9H2.6C1.71634 9 1 9.71634 1 10.6V20.2C1 21.0837 1.71634 21.8 2.6 21.8H15.4C16.2837 21.8 17 21.0837 17 20.2V10.6C17 9.71634 16.2837 9 15.4 9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M14.6 9.00001V6.6C14.6 5.11479 14.01 3.69041 12.9598 2.6402C11.9096 1.59 10.4852 1 9.00003 1C7.51481 1 6.09043 1.59 5.04023 2.6402C3.99002 3.69041 3.40002 5.11479 3.40002 6.6V9.00001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M9.00004 16.2C9.44187 16.2 9.80004 15.8418 9.80004 15.4C9.80004 14.9581 9.44187 14.6 9.00004 14.6C8.55821 14.6 8.20004 14.9581 8.20004 15.4C8.20004 15.8418 8.55821 16.2 9.00004 16.2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg></span>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                                                <div class="left d-flex align-items-center gap-2">
                                                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 7.4C1 4.38301 1 2.87452 1.99584 1.93726C2.99167 1 4.59445 1 7.8 1H8.41818C11.0271 1 12.3316 1 13.2375 1.63827C13.4971 1.82114 13.7275 2.03802 13.9218 2.28231C14.6 3.13494 14.6 4.36269 14.6 6.81818V8.85455C14.6 11.2251 14.6 12.4104 14.2249 13.357C13.6217 14.8789 12.3463 16.0793 10.7293 16.6469C9.7235 17 8.46415 17 5.94545 17C4.5062 17 3.78657 17 3.21182 16.7982C2.28783 16.4739 1.559 15.7879 1.21437 14.9183C1 14.3773 1 13.7 1 12.3455V7.4Z" stroke="#4F5158" stroke-width="1.2" stroke-linejoin="round"></path>
                                                                        <path d="M14.6016 9C14.6016 10.4728 13.4077 11.6667 11.9349 11.6667C11.4023 11.6667 10.7743 11.5733 10.2565 11.7121C9.79635 11.8354 9.43695 12.1948 9.31366 12.6549C9.1749 13.1728 9.26823 13.8007 9.26823 14.3333C9.26823 15.8061 8.07432 17 6.60156 17" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M4.60156 5H10.2016" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M4.60156 8.2002H7.00156" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                    <span><b>Reading:</b> Event Handling</span>
                                                                </div>
                                                                <div class="right d-flex align-items-center flex-wrap gap-3">
                                                                    <span>6 min</span>
                                                                    <span><svg width="14" height="18" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M15.4 9H2.6C1.71634 9 1 9.71634 1 10.6V20.2C1 21.0837 1.71634 21.8 2.6 21.8H15.4C16.2837 21.8 17 21.0837 17 20.2V10.6C17 9.71634 16.2837 9 15.4 9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M14.6 9.00001V6.6C14.6 5.11479 14.01 3.69041 12.9598 2.6402C11.9096 1.59 10.4852 1 9.00003 1C7.51481 1 6.09043 1.59 5.04023 2.6402C3.99002 3.69041 3.40002 5.11479 3.40002 6.6V9.00001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M9.00004 16.2C9.44187 16.2 9.80004 15.8418 9.80004 15.4C9.80004 14.9581 9.44187 14.6 9.00004 14.6C8.55821 14.6 8.20004 14.9581 8.20004 15.4C8.20004 15.8418 8.55821 16.2 9.00004 16.2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Lesson 6 -->
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#lessonSix" aria-expanded="false" aria-controls="lessonSix">
                                                            Final Quiz & Summary
                                                        </button>
                                                    </h2>
                                                    <div id="lessonSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body d-flex flex-column gap-5">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                                                <div class="left d-flex align-items-center gap-2">
                                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M4.89154 1.76885C5.27956 2.14783 5.51028 2.65928 5.53761 3.20098L7.50814 1.24122C7.57582 1.16535 7.65877 1.10463 7.75155 1.06306C7.84434 1.02149 7.94486 1 8.04654 1C8.14821 1 8.24873 1.02149 8.34152 1.06306C8.4343 1.10463 8.51725 1.16535 8.58493 1.24122L10.1786 2.89948C9.95223 3.00924 9.745 3.15466 9.56481 3.33019C9.18128 3.75197 8.97486 4.30522 8.98838 4.87514C9.00191 5.44507 9.23434 5.9879 9.63745 6.39101C10.0406 6.79412 10.5834 7.02655 11.1533 7.04008C11.7232 7.05361 12.2765 6.84719 12.6983 6.46365C12.8738 6.28346 13.0192 6.07623 13.129 5.84988L14.8088 7.50814C14.8847 7.57582 14.9454 7.65877 14.9869 7.75155C15.0285 7.84434 15.05 7.94486 15.05 8.04654C15.05 8.14821 15.0285 8.24873 14.9869 8.34152C14.9454 8.4343 14.8847 8.51725 14.8088 8.58493L12.849 10.5124C13.2735 10.5381 13.6815 10.6858 14.024 10.9378C14.3665 11.1898 14.629 11.5354 14.7797 11.933C14.9305 12.3306 14.9633 12.7633 14.874 13.1791C14.7848 13.5948 14.5774 13.976 14.2767 14.2767C13.976 14.5774 13.5948 14.7848 13.1791 14.874C12.7633 14.9633 12.3306 14.9305 11.933 14.7797C11.5354 14.629 11.1898 14.3665 10.9378 14.024C10.6858 13.6815 10.5381 13.2735 10.5124 12.849L8.54186 14.8088C8.47418 14.8847 8.39123 14.9454 8.29845 14.9869C8.20566 15.0285 8.10514 15.05 8.00346 15.05C7.90179 15.05 7.80127 15.0285 7.70848 14.9869C7.6157 14.9454 7.53275 14.8847 7.46507 14.8088L5.87142 13.1505C6.09777 13.0408 6.305 12.8953 6.48519 12.7198C6.90071 12.3014 7.13302 11.7351 7.131 11.1455C7.12898 10.5558 6.8928 9.9911 6.47442 9.57558C6.05604 9.16005 5.48973 8.92775 4.90008 8.92977C4.31042 8.93179 3.74572 9.16797 3.33019 9.58635C3.15466 9.76654 3.00924 9.97377 2.89948 10.2001L1.24122 8.54186C1.16535 8.47418 1.10463 8.39123 1.06306 8.29845C1.02149 8.20566 1 8.10514 1 8.00346C1 7.90179 1.02149 7.80127 1.06306 7.70848C1.10463 7.6157 1.16535 7.53275 1.24122 7.46507L3.20098 5.53761C2.65928 5.51028 2.14783 5.27956 1.76885 4.89154C1.35475 4.47744 1.12212 3.91581 1.12212 3.33019C1.12212 2.74458 1.35475 2.18294 1.76885 1.76885C2.18294 1.35475 2.74458 1.12212 3.33019 1.12212C3.91581 1.12212 4.47744 1.35475 4.89154 1.76885V1.76885Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                    <span><b>Quiz:</b> Test Your Knowledge</span>
                                                                </div>
                                                                <div class="right d-flex align-items-center flex-wrap gap-3">
                                                                    <span>10 Questions</span>
                                                                    <span><svg width="14" height="18" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M15.4 9H2.6C1.71634 9 1 9.71634 1 10.6V20.2C1 21.0837 1.71634 21.8 2.6 21.8H15.4C16.2837 21.8 17 21.0837 17 20.2V10.6C17 9.71634 16.2837 9 15.4 9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M14.6 9.00001V6.6C14.6 5.11479 14.01 3.69041 12.9598 2.6402C11.9096 1.59 10.4852 1 9.00003 1C7.51481 1 6.09043 1.59 5.04023 2.6402C3.99002 3.69041 3.40002 5.11479 3.40002 6.6V9.00001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M9.00004 16.2C9.44187 16.2 9.80004 15.8418 9.80004 15.4C9.80004 14.9581 9.44187 14.6 9.00004 14.6C8.55821 14.6 8.20004 14.9581 8.20004 15.4C8.20004 15.8418 8.55821 16.2 9.00004 16.2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg></span>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                                                <div class="left d-flex align-items-center gap-2">
                                                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 7.4C1 4.38301 1 2.87452 1.99584 1.93726C2.99167 1 4.59445 1 7.8 1H8.41818C11.0271 1 12.3316 1 13.2375 1.63827C13.4971 1.82114 13.7275 2.03802 13.9218 2.28231C14.6 3.13494 14.6 4.36269 14.6 6.81818V8.85455C14.6 11.2251 14.6 12.4104 14.2249 13.357C13.6217 14.8789 12.3463 16.0793 10.7293 16.6469C9.7235 17 8.46415 17 5.94545 17C4.5062 17 3.78657 17 3.21182 16.7982C2.28783 16.4739 1.559 15.7879 1.21437 14.9183C1 14.3773 1 13.7 1 12.3455V7.4Z" stroke="#4F5158" stroke-width="1.2" stroke-linejoin="round"></path>
                                                                        <path d="M14.6016 9C14.6016 10.4728 13.4077 11.6667 11.9349 11.6667C11.4023 11.6667 10.7743 11.5733 10.2565 11.7121C9.79635 11.8354 9.43695 12.1948 9.31366 12.6549C9.1749 13.1728 9.26823 13.8007 9.26823 14.3333C9.26823 15.8061 8.07432 17 6.60156 17" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M4.60156 5H10.2016" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M4.60156 8.2002H7.00156" stroke="#4F5158" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                    <span><b>Reading:</b> Course Recap</span>
                                                                </div>
                                                                <div class="right d-flex align-items-center flex-wrap gap-3">
                                                                    <span>5 min</span>
                                                                    <span><svg width="14" height="18" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M15.4 9H2.6C1.71634 9 1 9.71634 1 10.6V20.2C1 21.0837 1.71634 21.8 2.6 21.8H15.4C16.2837 21.8 17 21.0837 17 20.2V10.6C17 9.71634 16.2837 9 15.4 9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M14.6 9.00001V6.6C14.6 5.11479 14.01 3.69041 12.9598 2.6402C11.9096 1.59 10.4852 1 9.00003 1C7.51481 1 6.09043 1.59 5.04023 2.6402C3.99002 3.69041 3.40002 5.11479 3.40002 6.6V9.00001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M9.00004 16.2C9.44187 16.2 9.80004 15.8418 9.80004 15.4C9.80004 14.9581 9.44187 14.6 9.00004 14.6C8.55821 14.6 8.20004 14.9581 8.20004 15.4C8.20004 15.8418 8.55821 16.2 9.00004 16.2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div id="instructor" class="mb-10">
                                            <h3 class="h4 mb-5"> Your Instructors</h3>

                                            <div class="d-flex flex-wrap gap-10">
                                                <div class="avatar  avatar-xl rounded-pill">
                                                    <img src="<?= base_url('assets/'); ?>img/avatar/01.jpg" alt="conca">
                                                </div>

                                                <div class="">
                                                    <h4 class="h5 mb-1">Undon Xie</h4>
                                                    <span class="d-block mb-5">President of Sales</span>

                                                    <div class="d-flex align-items-center gap-5 flex-wrap mb-4">
                                                        <span class="d-inline-flex align-items-center gap-1">
                                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11.9376 8.84884C11.7434 9.03675 11.6541 9.3085 11.6984 9.57502L12.365 13.2583C12.4213 13.5705 12.2893 13.8864 12.0276 14.0668C11.7711 14.254 11.4299 14.2764 11.1502 14.1267L7.82888 12.3974C7.7134 12.336 7.58517 12.303 7.45393 12.2993H7.25071C7.18022 12.3098 7.11123 12.3322 7.04824 12.3667L3.72617 14.1042C3.56194 14.1866 3.37597 14.2158 3.19374 14.1866C2.7498 14.1027 2.45359 13.6805 2.52633 13.2351L3.19374 9.55181C3.23798 9.28305 3.14875 9.0098 2.95452 8.8189L0.246625 6.19868C0.0201542 5.97933 -0.0585855 5.64993 0.044901 5.35273C0.145388 5.05627 0.401854 4.83991 0.711564 4.79125L4.43858 4.25149C4.72204 4.22229 4.97101 4.0501 5.09849 3.79557L6.74078 0.434207C6.77977 0.359344 6.83001 0.29047 6.89076 0.232076L6.95825 0.179672C6.99349 0.140743 7.03399 0.108552 7.07898 0.0823496L7.16072 0.0524043L7.2882 0H7.60391C7.88588 0.0291967 8.13409 0.197639 8.26383 0.44918L9.92786 3.79557C10.0478 4.04037 10.2811 4.21031 10.5503 4.25149L14.2773 4.79125C14.5922 4.83617 14.8555 5.05327 14.9597 5.35273C15.0579 5.65293 14.9732 5.98233 14.7422 6.19868L11.9376 8.84884Z" fill="#FFB21D"></path>
                                                            </svg>
                                                            4.4 Rating
                                                        </span>
                                                        <span class="d-inline-flex align-items-center gap-1">
                                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5.61133 7.50075V6.53875C5.61133 5.29725 6.48883 4.79675 7.56133 5.41425L8.39333 5.89525L9.22533 6.37625C10.2978 6.99375 10.2978 8.00775 9.22533 8.62525L8.39333 9.10625L7.56133 9.58725C6.48883 10.2048 5.61133 9.69775 5.61133 8.46275V7.50075Z" stroke="#6C7275" stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M7.5 14C11.0899 14 14 11.0899 14 7.5C14 3.91015 11.0899 1 7.5 1C3.91015 1 1 3.91015 1 7.5C1 11.0899 3.91015 14 7.5 14Z" stroke="#6C7275" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                            58 Courses
                                                        </span>
                                                        <span class="d-inline-flex align-items-center gap-1">
                                                            <svg width="13" height="15" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6.5711 7.5C8.36215 7.5 9.81407 6.04493 9.81407 4.25C9.81407 2.45507 8.36215 1 6.5711 1C4.78005 1 3.32812 2.45507 3.32812 4.25C3.32812 6.04493 4.78005 7.5 6.5711 7.5Z" stroke="#6C7275" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M12.1429 14C12.1429 11.4845 9.64577 9.44999 6.57143 9.44999C3.49709 9.44999 1 11.4845 1 14" stroke="#6C7275" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                            45 Student
                                                        </span>
                                                    </div>
                                                    <div class="mb-6">
                                                        <p>I am also the founder of a large local design organization, Salt Lake Designers, where I and other local influencers help cultivate the talents of up and coming UX designers through workshops and panel discussions.</p>
                                                        <p>Undon Xie is a brilliant educator, whose life was spent for computer science and love of nature.</p>
                                                    </div>
                                                    <div class="d-flex align-items-center flex-wrap gap-2">
                                                        <a href="#" class="btn btn-icon btn-sm btn-label-primary rounded-pill">
                                                            <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.26878 7.01266C1.63274 7.01266 1.5 7.13497 1.5 7.721V8.7835C1.5 9.36953 1.63274 9.49183 2.26878 9.49183H3.80635V13.7418C3.80635 14.3279 3.9391 14.4502 4.57514 14.4502H6.11271C6.74875 14.4502 6.88149 14.3279 6.88149 13.7418V9.49183H8.60795C9.09034 9.49183 9.21464 9.40544 9.34716 8.97809L9.67664 7.91559C9.90365 7.18353 9.76376 7.01266 8.93743 7.01266H6.88149V5.24183C6.88149 4.85063 7.22569 4.5335 7.65028 4.5335H9.83836C10.4744 4.5335 10.6071 4.41119 10.6071 3.82516V2.4085C10.6071 1.82247 10.4744 1.70016 9.83836 1.70016H7.65028C5.52734 1.70016 3.80635 3.28582 3.80635 5.24183V7.01266H2.26878Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"></path>
                                                            </svg>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-sm btn-label-primary rounded-pill">
                                                            <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1.0957 7.65019C1.0957 4.84534 1.0957 3.44291 1.96706 2.57155C2.83842 1.7002 4.24085 1.7002 7.0457 1.7002C9.85056 1.7002 11.253 1.7002 12.1243 2.57155C12.9957 3.44291 12.9957 4.84534 12.9957 7.65019C12.9957 10.4551 12.9957 11.8575 12.1243 12.7288C11.253 13.6002 9.85056 13.6002 7.0457 13.6002C4.24085 13.6002 2.83842 13.6002 1.96706 12.7288C1.0957 11.8575 1.0957 10.4551 1.0957 7.65019Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"></path>
                                                                <path d="M9.86145 7.65045C9.86145 9.20702 8.5996 10.4689 7.04303 10.4689C5.48646 10.4689 4.22461 9.20702 4.22461 7.65045C4.22461 6.09388 5.48646 4.83203 7.04303 4.83203C8.5996 4.83203 9.86145 6.09388 9.86145 7.65045Z" stroke="currentColor" stroke-width="1.5"></path>
                                                                <path d="M10.4941 4.20557L10.4852 4.20557" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-sm btn-label-primary rounded-pill">
                                                            <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M14.2578 1.60544C13.7028 1.99691 13.0884 2.29632 12.438 2.49214C12.089 2.09081 11.6251 1.80636 11.1092 1.67726C10.5932 1.54816 10.05 1.58063 9.55311 1.77029C9.0562 1.95995 8.62952 2.29765 8.33079 2.7377C8.03206 3.17776 7.87568 3.69895 7.88281 4.23078V4.81032C6.86434 4.83673 5.85514 4.61085 4.9451 4.1528C4.03506 3.69474 3.25243 3.01874 2.6669 2.18498C2.6669 2.18498 0.348722 7.40089 5.56463 9.71907C4.37107 10.5293 2.94923 10.9355 1.50781 10.8782C6.72372 13.7759 13.0987 10.8782 13.0987 4.21339C13.0982 4.05196 13.0827 3.89093 13.0524 3.73237C13.6438 3.14905 14.0612 2.41258 14.2578 1.60544Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-sm btn-label-primary rounded-pill">
                                                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M7.27344 12.3997C8.42711 12.3997 9.53344 12.2857 10.5588 12.0767C11.8394 11.8156 12.4798 11.6851 13.0641 10.9338C13.6484 10.1825 13.6484 9.32007 13.6484 7.59517V6.36665C13.6484 4.64175 13.6484 3.77931 13.0641 3.02801C12.4798 2.27672 11.8394 2.14619 10.5588 1.88514C9.53344 1.67613 8.42711 1.56216 7.27344 1.56216C6.11976 1.56216 5.01343 1.67613 3.98812 1.88514C2.70744 2.14619 2.06711 2.27672 1.48277 3.02801C0.898438 3.77931 0.898438 4.64175 0.898438 6.36665V7.59517C0.898438 9.32007 0.898438 10.1825 1.48277 10.9338C2.06711 11.6851 2.70744 11.8156 3.98812 12.0767C5.01343 12.2857 6.11976 12.3997 7.27344 12.3997Z" stroke="currentColor" stroke-width="1.5"></path>
                                                                <path d="M9.80164 7.18071C9.70704 7.56693 9.20365 7.84432 8.19688 8.3991C7.1019 9.00247 6.55441 9.30416 6.11094 9.18793C5.96074 9.14857 5.82241 9.07935 5.70625 8.98544C5.36328 8.70816 5.36328 8.13252 5.36328 6.98125C5.36328 5.82998 5.36328 5.25434 5.70625 4.97706C5.82241 4.88315 5.96074 4.81393 6.11094 4.77457C6.55441 4.65834 7.1019 4.96003 8.19688 5.5634C9.20365 6.11818 9.70704 6.39557 9.80164 6.78179C9.83383 6.9132 9.83383 7.0493 9.80164 7.18071Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="reviews" class="">
                                            <div class="tp-course-details-2-review-rating">
                                                <div class="row gx-2 gy-4">
                                                    <div class="col-lg-4">
                                                        <div class="border rounded py-10 px-5 text-center h-100">
                                                            <h5 class="fs-12 mb-1">4.5</h5>
                                                            <div class="rating-icons mb-2">
                                                                <span>
                                                                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M10.3459 7.669C10.1776 7.83185 10.1002 8.06737 10.1386 8.29835L10.7164 11.4905C10.7651 11.7611 10.6507 12.0349 10.4239 12.1912C10.2016 12.3534 9.90592 12.3729 9.66351 12.2431L6.78503 10.7444C6.68495 10.6912 6.57381 10.6626 6.46008 10.6594H6.28395C6.22286 10.6685 6.16306 10.6879 6.10847 10.7178L3.22935 12.2237C3.08702 12.295 2.92584 12.3204 2.76791 12.295C2.38316 12.2224 2.12644 11.8565 2.18948 11.4704L2.76791 8.27823C2.80625 8.04531 2.72891 7.80849 2.56058 7.64304L0.213741 5.37219C0.017467 5.18209 -0.0507741 4.89661 0.0389142 4.63903C0.126003 4.3821 0.348274 4.19459 0.616689 4.15242L3.84677 3.68462C4.09243 3.65932 4.30821 3.51009 4.41869 3.28949L5.84201 0.376313C5.8758 0.311431 5.91935 0.25174 5.97199 0.201133L6.03048 0.155716C6.06103 0.121977 6.09612 0.0940782 6.13512 0.0713697L6.20596 0.0454171L6.31644 0H6.59006C6.83443 0.0253038 7.04955 0.171287 7.16198 0.389289L8.60415 3.28949C8.70813 3.50166 8.91026 3.64894 9.14357 3.68462L12.3737 4.15242C12.6466 4.19135 12.8747 4.3795 12.9651 4.63903C13.0502 4.8992 12.9768 5.18468 12.7766 5.37219L10.3459 7.669Z" fill="#FFB21D" />
                                                                    </svg>
                                                                </span>
                                                                <span>
                                                                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M10.3459 7.669C10.1776 7.83185 10.1002 8.06737 10.1386 8.29835L10.7164 11.4905C10.7651 11.7611 10.6507 12.0349 10.4239 12.1912C10.2016 12.3534 9.90592 12.3729 9.66351 12.2431L6.78503 10.7444C6.68495 10.6912 6.57381 10.6626 6.46008 10.6594H6.28395C6.22286 10.6685 6.16306 10.6879 6.10847 10.7178L3.22935 12.2237C3.08702 12.295 2.92584 12.3204 2.76791 12.295C2.38316 12.2224 2.12644 11.8565 2.18948 11.4704L2.76791 8.27823C2.80625 8.04531 2.72891 7.80849 2.56058 7.64304L0.213741 5.37219C0.017467 5.18209 -0.0507741 4.89661 0.0389142 4.63903C0.126003 4.3821 0.348274 4.19459 0.616689 4.15242L3.84677 3.68462C4.09243 3.65932 4.30821 3.51009 4.41869 3.28949L5.84201 0.376313C5.8758 0.311431 5.91935 0.25174 5.97199 0.201133L6.03048 0.155716C6.06103 0.121977 6.09612 0.0940782 6.13512 0.0713697L6.20596 0.0454171L6.31644 0H6.59006C6.83443 0.0253038 7.04955 0.171287 7.16198 0.389289L8.60415 3.28949C8.70813 3.50166 8.91026 3.64894 9.14357 3.68462L12.3737 4.15242C12.6466 4.19135 12.8747 4.3795 12.9651 4.63903C13.0502 4.8992 12.9768 5.18468 12.7766 5.37219L10.3459 7.669Z" fill="#FFB21D" />
                                                                    </svg>
                                                                </span>
                                                                <span>
                                                                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M10.3459 7.669C10.1776 7.83185 10.1002 8.06737 10.1386 8.29835L10.7164 11.4905C10.7651 11.7611 10.6507 12.0349 10.4239 12.1912C10.2016 12.3534 9.90592 12.3729 9.66351 12.2431L6.78503 10.7444C6.68495 10.6912 6.57381 10.6626 6.46008 10.6594H6.28395C6.22286 10.6685 6.16306 10.6879 6.10847 10.7178L3.22935 12.2237C3.08702 12.295 2.92584 12.3204 2.76791 12.295C2.38316 12.2224 2.12644 11.8565 2.18948 11.4704L2.76791 8.27823C2.80625 8.04531 2.72891 7.80849 2.56058 7.64304L0.213741 5.37219C0.017467 5.18209 -0.0507741 4.89661 0.0389142 4.63903C0.126003 4.3821 0.348274 4.19459 0.616689 4.15242L3.84677 3.68462C4.09243 3.65932 4.30821 3.51009 4.41869 3.28949L5.84201 0.376313C5.8758 0.311431 5.91935 0.25174 5.97199 0.201133L6.03048 0.155716C6.06103 0.121977 6.09612 0.0940782 6.13512 0.0713697L6.20596 0.0454171L6.31644 0H6.59006C6.83443 0.0253038 7.04955 0.171287 7.16198 0.389289L8.60415 3.28949C8.70813 3.50166 8.91026 3.64894 9.14357 3.68462L12.3737 4.15242C12.6466 4.19135 12.8747 4.3795 12.9651 4.63903C13.0502 4.8992 12.9768 5.18468 12.7766 5.37219L10.3459 7.669Z" fill="#FFB21D" />
                                                                    </svg>
                                                                </span>
                                                                <span>
                                                                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M10.3459 7.669C10.1776 7.83185 10.1002 8.06737 10.1386 8.29835L10.7164 11.4905C10.7651 11.7611 10.6507 12.0349 10.4239 12.1912C10.2016 12.3534 9.90592 12.3729 9.66351 12.2431L6.78503 10.7444C6.68495 10.6912 6.57381 10.6626 6.46008 10.6594H6.28395C6.22286 10.6685 6.16306 10.6879 6.10847 10.7178L3.22935 12.2237C3.08702 12.295 2.92584 12.3204 2.76791 12.295C2.38316 12.2224 2.12644 11.8565 2.18948 11.4704L2.76791 8.27823C2.80625 8.04531 2.72891 7.80849 2.56058 7.64304L0.213741 5.37219C0.017467 5.18209 -0.0507741 4.89661 0.0389142 4.63903C0.126003 4.3821 0.348274 4.19459 0.616689 4.15242L3.84677 3.68462C4.09243 3.65932 4.30821 3.51009 4.41869 3.28949L5.84201 0.376313C5.8758 0.311431 5.91935 0.25174 5.97199 0.201133L6.03048 0.155716C6.06103 0.121977 6.09612 0.0940782 6.13512 0.0713697L6.20596 0.0454171L6.31644 0H6.59006C6.83443 0.0253038 7.04955 0.171287 7.16198 0.389289L8.60415 3.28949C8.70813 3.50166 8.91026 3.64894 9.14357 3.68462L12.3737 4.15242C12.6466 4.19135 12.8747 4.3795 12.9651 4.63903C13.0502 4.8992 12.9768 5.18468 12.7766 5.37219L10.3459 7.669Z" fill="#FFB21D" />
                                                                    </svg>
                                                                </span>
                                                                <span>
                                                                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M10.3459 7.669C10.1776 7.83185 10.1002 8.06737 10.1386 8.29835L10.7164 11.4905C10.7651 11.7611 10.6507 12.0349 10.4239 12.1912C10.2016 12.3534 9.90592 12.3729 9.66351 12.2431L6.78503 10.7444C6.68495 10.6912 6.57381 10.6626 6.46008 10.6594H6.28395C6.22286 10.6685 6.16306 10.6879 6.10847 10.7178L3.22935 12.2237C3.08702 12.295 2.92584 12.3204 2.76791 12.295C2.38316 12.2224 2.12644 11.8565 2.18948 11.4704L2.76791 8.27823C2.80625 8.04531 2.72891 7.80849 2.56058 7.64304L0.213741 5.37219C0.017467 5.18209 -0.0507741 4.89661 0.0389142 4.63903C0.126003 4.3821 0.348274 4.19459 0.616689 4.15242L3.84677 3.68462C4.09243 3.65932 4.30821 3.51009 4.41869 3.28949L5.84201 0.376313C5.8758 0.311431 5.91935 0.25174 5.97199 0.201133L6.03048 0.155716C6.06103 0.121977 6.09612 0.0940782 6.13512 0.0713697L6.20596 0.0454171L6.31644 0H6.59006C6.83443 0.0253038 7.04955 0.171287 7.16198 0.389289L8.60415 3.28949C8.70813 3.50166 8.91026 3.64894 9.14357 3.68462L12.3737 4.15242C12.6466 4.19135 12.8747 4.3795 12.9651 4.63903C13.0502 4.8992 12.9768 5.18468 12.7766 5.37219L10.3459 7.669Z" fill="#FFB21D" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <p class="fw-medium m-0">Rated 4 out of 1 Rating</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="">
                                                            <div class="border rounded p-10 d-flex flex-column gap-1">
                                                                <!-- 5 Star -->
                                                                <div class="d-flex align-items-center justify-content-between gap-3">
                                                                    <div class="course-details-review-text">
                                                                        <span>5 star</span>
                                                                    </div>
                                                                    <div class="progress height-4px flex-grow-1 translate-y-1" role="progressbar" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar bg-warning" style="width: 82%"></div>
                                                                    </div>
                                                                    <div class="course-details-review-text"><span>82%</span></div>
                                                                </div>

                                                                <!-- 4 Star -->
                                                                <div class="d-flex align-items-center justify-content-between gap-3">
                                                                    <div class="course-details-review-text">
                                                                        <span>4 star</span>
                                                                    </div>
                                                                    <div class="progress height-4px flex-grow-1 translate-y-1" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar bg-warning" style="width: 10%"></div>
                                                                    </div>
                                                                    <div class="course-details-review-text"><span>10%</span></div>
                                                                </div>

                                                                <!-- 3 Star -->
                                                                <div class="d-flex align-items-center justify-content-between gap-3">
                                                                    <div class="course-details-review-text">
                                                                        <span>3 star</span>
                                                                    </div>
                                                                    <div class="progress height-4px flex-grow-1 translate-y-1" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar bg-warning" style="width: 5%"></div>
                                                                    </div>
                                                                    <div class="course-details-review-text"><span>5%</span></div>
                                                                </div>

                                                                <!-- 2 Star -->
                                                                <div class="d-flex align-items-center justify-content-between gap-3">
                                                                    <div class="course-details-review-text">
                                                                        <span>2 star</span>
                                                                    </div>
                                                                    <div class="progress height-4px flex-grow-1 translate-y-1" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar bg-warning" style="width: 2%"></div>
                                                                    </div>
                                                                    <div class="course-details-review-text"><span>2%</span></div>
                                                                </div>

                                                                <!-- 1 Star -->
                                                                <div class="d-flex align-items-center justify-content-between gap-3">
                                                                    <div class="course-details-review-text">
                                                                        <span>1 star</span>
                                                                    </div>
                                                                    <div class="progress height-4px flex-grow-1 translate-y-1" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar bg-warning" style="width: 1%"></div>
                                                                    </div>
                                                                    <div class="course-details-review-text"><span>1%</span></div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card-bg rounded-md p-4 shadow-custom position-sticky top-10">
                                        <div class="mb-5">
                                            <video class="w-100" poster="../../../cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" id="plyr-video-player" playsinline controls>
                                                <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4">
                                            </video>
                                        </div>
                                        <div class="">
                                            <div class="mb-5">
                                                <span class="fs-6 text-custom-black fw-semibold">$120.99 </span>
                                                <del class="fw-medium">$145.99 </del>
                                            </div>
                                            <div class="mb-5">
                                                <a class="btn btn-primary btn-lg w-100 mb-2" href="#">Enroll Now</a>
                                                <p class="text-success fw-medium">30-Day Money-Back Guarantee</p>
                                            </div>

                                            <div class="">
                                                <h5>This course includes:</h5>

                                                <div class="border-bottom py-3-wrapper">

                                                    <div class="border-bottom py-3 d-flex align-items-center justify-content-between">
                                                        <span> <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.5 1C12.6415 1 16 4.35775 16 8.5C16 12.6423 12.6415 16 8.5 16C4.35775 16 1 12.6423 1 8.5C1 4.35775 4.35775 1 8.5 1Z" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.8692 8.49618C10.8692 7.85581 7.58703 5.80721 7.2147 6.17556C6.84237 6.54391 6.80657 10.4137 7.2147 10.8168C7.62283 11.2213 10.8692 9.13655 10.8692 8.49618Z" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg> Lectures</span>
                                                        <span>40</span>
                                                    </div>
                                                    <div class="border-bottom py-3 d-flex align-items-center justify-content-between">
                                                        <span> <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15Z" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M8 3.80005V8.00005L10.8 9.40005" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg> Duration</span>
                                                        <span>4h 50m</span>
                                                    </div>
                                                    <div class="border-bottom py-3 d-flex align-items-center justify-content-between">
                                                        <span> <svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5.5 13V5.5" stroke="#4F5158" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M10 13V1" stroke="#4F5158" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M1 13V10" stroke="#4F5158" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg> Skill Level</span>
                                                        <span>Beginner</span>
                                                    </div>
                                                    <div class="border-bottom py-3 d-flex align-items-center justify-content-between">
                                                        <span> <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M8 15.5C11.866 15.5 15 12.366 15 8.5C15 4.63401 11.866 1.5 8 1.5C4.13401 1.5 1 4.63401 1 8.5C1 12.366 4.13401 15.5 8 15.5Z" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M1 8.5H15" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M7.99727 1.5C9.74816 3.41685 10.7432 5.90442 10.7973 8.5C10.7432 11.0956 9.74816 13.5832 7.99727 15.5C6.24637 13.5832 5.25134 11.0956 5.19727 8.5C5.25134 5.90442 6.24637 3.41685 7.99727 1.5Z" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg> Language</span>
                                                        <span>English</span>
                                                    </div>
                                                    <div class="border-bottom py-3 d-flex align-items-center justify-content-between">
                                                        <span> <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.4" d="M1.06836 6.18286H13.5451" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path opacity="0.4" d="M10.4102 8.91675H10.4194" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path opacity="0.4" d="M7.30273 8.91675H7.312" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path opacity="0.4" d="M4.1875 8.91675H4.19676" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path opacity="0.4" d="M10.4102 11.6375H10.4194" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path opacity="0.4" d="M7.30273 11.6375H7.312" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path opacity="0.4" d="M4.1875 11.6375H4.19676" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M10.1289 1V3.30355" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M4.47656 1V3.30355" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.2668 2.10535H4.33967C2.28399 2.10535 1 3.2505 1 5.35547V11.6902C1 13.8283 2.28399 14.9999 4.33967 14.9999H10.2603C12.3225 14.9999 13.6 13.8481 13.6 11.7432V5.35547C13.6065 3.2505 12.329 2.10535 10.2668 2.10535Z" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg> Deadline</span>
                                                        <span>30 Nov 2024</span>
                                                    </div>
                                                    <div class="border-bottom py-3 d-flex align-items-center justify-content-between">
                                                        <span> <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M14.721 6.64274C14.721 7.8116 14.3744 8.88373 13.7779 9.77851C12.9073 11.0683 11.5289 11.9792 9.9247 12.2129C9.65063 12.2613 9.36849 12.2855 9.07829 12.2855C8.78809 12.2855 8.50596 12.2613 8.23188 12.2129C6.62773 11.9792 5.24929 11.0683 4.37869 9.77851C3.78217 8.88373 3.43555 7.8116 3.43555 6.64274C3.43555 3.52311 5.95866 1 9.07829 1C12.1979 1 14.721 3.52311 14.721 6.64274Z" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path opacity="0.4" d="M16.5341 14.2766L15.2041 14.591C14.9058 14.6636 14.672 14.8893 14.6075 15.1875L14.3254 16.3725C14.1722 17.0174 13.35 17.2109 12.9228 16.703L9.07766 12.2856L5.23253 16.7111C4.80529 17.2189 3.98307 17.0255 3.82991 16.3806L3.54777 15.1956C3.47522 14.8973 3.24145 14.6636 2.95125 14.5991L1.62117 14.2847C1.00853 14.1396 0.790885 13.3738 1.23424 12.9304L4.37806 9.78662C5.24865 11.0764 6.6271 11.9873 8.23125 12.2211C8.50532 12.2694 8.78746 12.2936 9.07766 12.2936C9.36786 12.2936 9.64999 12.2694 9.92407 12.2211C11.5282 11.9873 12.9067 11.0764 13.7773 9.78662L16.9211 12.9304C17.3644 13.3657 17.1468 14.1315 16.5341 14.2766Z" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path opacity="0.4" d="M9.54557 4.20822L10.0212 5.15942C10.0857 5.2884 10.2549 5.41738 10.4081 5.44156L11.2706 5.58665C11.8188 5.67533 11.9478 6.07838 11.5528 6.47338L10.8837 7.14243C10.7709 7.25529 10.7064 7.47295 10.7467 7.63417L10.9401 8.46446C11.0933 9.11741 10.7467 9.37535 10.1663 9.02872L9.36017 8.55312C9.21507 8.46445 8.97324 8.46445 8.82814 8.55312L8.02203 9.02872C7.44163 9.36728 7.09501 9.11741 7.24817 8.46446L7.44163 7.63417C7.47388 7.48101 7.41745 7.25529 7.3046 7.14243L6.63553 6.47338C6.24054 6.07838 6.36951 5.68339 6.91766 5.58665L7.7802 5.44156C7.9253 5.41738 8.09458 5.2884 8.15907 5.15942L8.63467 4.20822C8.86844 3.69231 9.28762 3.69231 9.54557 4.20822Z" stroke="#4F5158" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg> Certificate</span>
                                                        <span>Yes</span>
                                                    </div>

                                                    <div class="mt-5 d-flex align-items-center justify-content-between mb-4">
                                                        <a class="d-flex align-items-center gap-1 text-decoration-none fw-medium" href="#">
                                                            <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11.5023 5.2C12.6621 5.2 13.6023 4.2598 13.6023 3.1C13.6023 1.9402 12.6621 1 11.5023 1C10.3425 1 9.40234 1.9402 9.40234 3.1C9.40234 4.2598 10.3425 5.2 11.5023 5.2Z" stroke="#5169F1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M3.1 10.1001C4.2598 10.1001 5.2 9.15994 5.2 8.00014C5.2 6.84035 4.2598 5.90015 3.1 5.90015C1.9402 5.90015 1 6.84035 1 8.00014C1 9.15994 1.9402 10.1001 3.1 10.1001Z" stroke="#5169F1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M11.5023 15C12.6621 15 13.6023 14.0598 13.6023 12.9C13.6023 11.7403 12.6621 10.8 11.5023 10.8C10.3425 10.8 9.40234 11.7403 9.40234 12.9C9.40234 14.0598 10.3425 15 11.5023 15Z" stroke="#5169F1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M4.91406 9.05701L9.69506 11.843" stroke="#5169F1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M9.68806 4.15723L4.91406 6.94322" stroke="#5169F1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                            Share this course
                                                        </a>

                                                        <a class="coupon text-orange" href="#">Apply coupon</a>
                                                    </div>
                                                    <div class="tp-course-details-2-widget-search p-relative">
                                                        <form action="#">
                                                            <div class="position-relative">
                                                                <input class="form-control" type="text" placeholder="Enter Coupon Code">
                                                                <button class="btn btn-dark position-absolute top-0 end-0" type="submit">Apply</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- page content end -->

                </div>