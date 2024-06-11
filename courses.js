let currentHeadingId = null; // Global variable to keep track of the current heading

function showCourse(courseId) {
  const courses = document.querySelectorAll(".course-content");

  // Hide all course contents
  courses.forEach((course) => {
    course.classList.remove("active");
  });

  // Show the selected course content
  document.getElementById(courseId).classList.add("active");

  // Hide all headings
  const headings = document.querySelectorAll(".course-heading");
  headings.forEach((heading) => {
    heading.style.display = "none";
  });

  // Show the selected course heading
  document.getElementById(courseId + "-heading").style.display = "block";

  // Update the current heading
  currentHeadingId = courseId;

  // Hide all videos first
  hideAllVideos();

  // Load the videos for the selected course
  loadCourseVideos(courseId);
}

function hideAllVideos() {
  const videoContents = document.querySelectorAll(".video-content");
  videoContents.forEach((videoContent) => {
    videoContent.innerHTML = "";
  });
}

const themeToggle = document.getElementById("night-mode-toggle");

themeToggle.addEventListener("click", () => {
  document.body.classList.toggle("light-mode");
  document.body.classList.toggle("dark-mode");
});

// Select the search bar element
const searchBar = document.getElementById("search-bar");

// Add an event listener for the 'keyup' event
searchBar.addEventListener("keyup", (event) => {
  if (event.key === "Enter") {
    searchCourses(event.target.value);
  }
});
function searchCourses(query) {
  const courses = document.querySelectorAll(".course-content");
  const courseHeadings = document.querySelectorAll(".course-heading");

  // Hide all course contents initially
  courses.forEach((course) => {
    course.classList.remove("active");
  });

  // Hide all headings initially
  courseHeadings.forEach((heading) => {
    heading.style.display = "none";
  });

  // Convert query to lower case for case insensitive search
  query = query.toLowerCase();

  // Check each course for a matching title or video
  let matchFound = false;
  for (const courseId in courseVideos) {
    const videos = courseVideos[courseId];
    const courseHeading = document.getElementById(courseId + "-heading");

    if (courseHeading.textContent.toLowerCase().includes(query)) {
      document.getElementById(courseId).classList.add("active");
      courseHeading.style.display = "block";
      loadCourseVideos(courseId);
      matchFound = true;
    } else {
      // Check within videos of the course
      let videoMatchFound = false;
      for (const video of videos) {
        if (video.title.toLowerCase().includes(query)) {
          document.getElementById(courseId).classList.add("active");
          courseHeading.style.display = "block";
          loadCourseVideos(courseId);
          videoMatchFound = true;
          matchFound = true;
          break;
        }
      }

      if (videoMatchFound) {
        break;
      }
    }
  }

  if (!matchFound) {
    alert("No matching courses or videos found.");
    document.getElementById("search-bar").value = "";
  }
}

const courseVideos = {
  course1: [
    {
      title: "HTML Full Course",
      url: "https://youtu.be/HcOc7P5BMi4?si=8qoxXjvki7IT7rxw",
      embed: "https://www.youtube.com/embed/HcOc7P5BMi4?si=ggyurkhHUjI6HPz6",
    },
    {
      title: "CSS Crush Course",
      url: "https://youtu.be/ESnrn1kAD4E?si=CitVFIC6C3-AdIHd",
      embed: "https://www.youtube.com/embed/ESnrn1kAD4E?si=CitVFIC6C3-AdIHd",
    },
    {
      title: "JavaScript Full Course",
      url: "https://youtu.be/VlPiVmYuoqw?si=XVXbrgNjZmvd9mFA",
      embed: "https://www.youtube.com/embed/VlPiVmYuoqw?si=XVXbrgNjZmvd9mFA",
    },
    {
      title: "Bootstrap Crush Courses",
      url: "https://youtu.be/0xFthg_XeOU?si=6KSTP79lleAsrEn9",
      embed: "https://www.youtube.com/embed/0xFthg_XeOU?si=6KSTP79lleAsrEn9",
    },
    {
      title: "PHP Playlist",
      url: "https://youtu.be/at19OmH2Bg4?si=Y4YJ1hB2ZMp_Ee75",
      embed: "https://www.youtube.com/embed/at19OmH2Bg4",
    },
    {
      title: "Ajax Playlist",
      url: "https://youtu.be/dhLWefQTnNo?si=wJVfx_7OYnr6H7C7",
      embed: "https://www.youtube.com/embed/dhLWefQTnNo",
    },
  ],
  course2: [
    {
      title: "Introduction to Software Engineering",
      url: "https://youtu.be/b7hmU72GRaE?si=-iERW8961aTEkYH0",
      embed: "https://www.youtube.com/embed/b7hmU72GRaE?si=KrCsBgutSXVbsVyP",
    },
    {
      title: "Agile Method Of Software Development",
      url: "https://youtu.be/Xs6E-MAJbfE?si=BO3RwdhY2zV_ZGVY",
      embed: "https://www.youtube.com/embed/Xs6E-MAJbfE?si=BO3RwdhY2zV_ZGVY",
    },
    {
      title: "Waterfall model in software Engineering",
      url: "https://youtu.be/noE3pnRzQGI?si=KeJEs7I4uNOtWK6Z",
      embed: "https://www.youtube.com/embed/qo9I57qH1Tc?si=ZYStezclFYO0-5p9",
    },
    {
      title: "What is SDLC? full Explanation",
      url: "https://youtu.be/tK9O2Pr9zW0?si=KTQoUNn8fEvvkGyl",
      embed: "https://www.youtube.com/embed/tK9O2Pr9zW0?si=KTQoUNn8fEvvkGyl",
    },
    {
      title: "Functional vs Non-functional Requirements",
      url: "https://youtu.be/IBqO6aUkJSE?si=1XdVtP7qVX7lpfjZ",
      embed: "https://www.youtube.com/embed/IBqO6aUkJSE?si=1XdVtP7qVX7lpfjZ",
    },
    {
      title: "Software Requirements Specification (SRS)",
      url: "https://youtu.be/83-S5Qu6VP8?si=fqyddtmF5sDwivQZ",
      embed: "https://www.youtube.com/embed/83-S5Qu6VP8?si=fqyddtmF5sDwivQZ",
    },
  ],
  course3: [
    {
      title: "Operating System Playlist",
      url: "https://youtu.be/ukLxQXj89Lg?si=Q2bLecpKusx7rRFX",
      embed: "https://www.youtube.com/embed/ukLxQXj89Lg?si=Q2bLecpKusx7rRFX",
    },
    {
      title: "Multiprogramming and Multitasking / Time Sharing",
      url: "https://youtu.be/Yj2ymGIoL7A?si=VG1m4roD7vd924It",
      embed: "https://www.youtube.com/embed/Yj2ymGIoL7A?si=VG1m4roD7vd924It",
    },
    {
      title: "Process Control Block (PCB)",
      url: "https://youtu.be/2-KGdKp_aSc?si=aBZWF-sc5h2BX1ds",
      embed: "https://www.youtube.com/embed/2-KGdKp_aSc?si=aBZWF-sc5h2BX1ds",
    },
    {
      title: "Operating System Context Switching",
      url: "https://youtu.be/cqkejtfRgbc?si=z93BVaF7Wt7ly12Y",
      embed: "https://www.youtube.com/embed/cqkejtfRgbc?si=z93BVaF7Wt7ly12Y",
    },
    {
      title: "CPU Scheduling Algorithms",
      url: "https://youtu.be/x68wMU-BXZ8?si=uVi_tktrrGp5c1q_",
      embed: "https://www.youtube.com/embed/x68wMU-BXZ8?si=uVi_tktrrGp5c1q_",
    },
    {
      title: "First Come First Serve (FCFS)",
      url: "https://youtu.be/DoQAzEBcIBI?si=zUAkal_HSEO9EBMh",
      embed: "https://www.youtube.com/embed/DoQAzEBcIBI?si=zUAkal_HSEO9EBMh",
    },
    {
      title: "Shortest Job First (SJF)",
      url: "https://youtu.be/o2jGbOLJFLc?si=v5b-YmUG8yGL_9Qp",
      embed: "https://www.youtube.com/embed/o2jGbOLJFLc?si=v5b-YmUG8yGL_9Qp",
    },
    {
      title: "Priority Scheduling Algorithm ",
      url: "https://youtu.be/u3JTFCMzEao?si=Erza0k-GGd7bjebr",
      embed: "https://www.youtube.com/embed/u3JTFCMzEao?si=Erza0k-GGd7bjebr",
    },
    {
      title: "Round Robin with arrival time",
      url: "https://youtu.be/hfwGU3VMR14?si=gnKnP09r4SdpSGv0",
      embed: "https://www.youtube.com/embed/hfwGU3VMR14?si=gnKnP09r4SdpSGv0",
    },
    {
      title: "Deadlock | Operating System",
      url: "https://youtu.be/0OnxLL1zfLs?si=XUUDRLMxQd7FKyVg",
      embed: "https://www.youtube.com/embed/0OnxLL1zfLs?si=XUUDRLMxQd7FKyVg",
    },
    {
      title: "Banker's Algorithm | Deadlock Avoidance ",
      url: "https://youtu.be/cMaxXISWWHo?si=zpU-kj0kOLJi6i3J",
      embed: "https://www.youtube.com/embed/cMaxXISWWHo?si=zpU-kj0kOLJi6i3J",
    },
  ],
  course4: [
    {
      title: "OSI Model Full Understanding",
      url: "https://youtu.be/4D55Cmj2t-A?si=GgBtr6H4uQI2JdNy",
      embed: "https://www.youtube.com/embed/4D55Cmj2t-A?si=GgBtr6H4uQI2JdNy",
    },
    {
      title: "IPv4 Address",
      url: "https://youtu.be/phOlq9SuscM?si=ODHG0P53tLO2Iq67",
      embed: "https://www.youtube.com/embed/phOlq9SuscM?si=ODHG0P53tLO2Iq67",
    },
    {
      title: "TCP/IP Protocol Suite",
      url: "https://youtu.be/TVr0RZ1-74g?si=P7pLbWm0ILBRK1UT",
      embed: "https://www.youtube.com/embed/TVr0RZ1-74g?si=P7pLbWm0ILBRK1UT",
    },
    {
      title: "TCP/IP VS OSI Model",
      url: "https://youtu.be/GfaHdjApnhU?si=K_ntZOfyFCNe8duI",
      embed: "https://www.youtube.com/embed/GfaHdjApnhU?si=K_ntZOfyFCNe8duI",
    },
    {
      title: "Data and signals in data communication",
      url: "https://youtu.be/j0CnGc7SXqY?si=8SpXtXwBHpaceA0n",
      embed: "https://www.youtube.com/embed/j0CnGc7SXqY?si=8SpXtXwBHpaceA0n",
    },
    {
      title: "Transmission Media Playlist",
      url: "https://youtu.be/qNZHh63zaU4?si=kp616twx8MVqgxDh",
      embed: "https://www.youtube.com/embed/qNZHh63zaU4?si=kp616twx8MVqgxDh",
    },
    {
      title: "Digital Transmission (Line Coding) Playlist",
      url: "https://youtu.be/Q9O8WbG6XKE?si=VeQ_XiPrQqrpVlGC",
      embed: "https://www.youtube.com/embed/Q9O8WbG6XKE?si=VeQ_XiPrQqrpVlGC",
    },
    {
      title: "Analog Transmission Playlist",
      url: "https://youtu.be/Rz6lOJdkkpE?si=mPSBJjfhJ9xEbWQc",
      embed: "https://www.youtube.com/embed/Rz6lOJdkkpE?si=mPSBJjfhJ9xEbWQc",
    },
    {
      title: "Hamming Code for Error Detection & Correction",
      url: "https://youtu.be/V5Iu52tbZEQ?si=OH4S8tha_SHqXMxz",
      embed: "https://www.youtube.com/embed/V5Iu52tbZEQ?si=OH4S8tha_SHqXMxz",
    },
  ],
  course5: [
    {
      title: "Induction Motor (Lecturer-Green University)",
      url: "https://youtu.be/sSCYX-dmp6w?si=wKsaD9eTxzNKfkiR",
      embed:
        "https://www.youtube.com/embed/sSCYX-dmp6w?si=wKsaD9eTxzNKfkiR&amp;start=6",
    },
    {
      title: "IPv4 Address",
      url: "https://youtu.be/phOlq9SuscM?si=ODHG0P53tLO2Iq67",
      embed: "https://www.youtube.com/embed/phOlq9SuscM?si=ODHG0P53tLO2Iq67",
    },
    {
      title: "TCP/IP Protocol Suite",
      url: "https://youtu.be/TVr0RZ1-74g?si=P7pLbWm0ILBRK1UT",
      embed: "https://www.youtube.com/embed/TVr0RZ1-74g?si=P7pLbWm0ILBRK1UT",
    },
    {
      title: "TCP/IP VS OSI Model",
      url: "https://youtu.be/GfaHdjApnhU?si=K_ntZOfyFCNe8duI",
      embed: "https://www.youtube.com/embed/GfaHdjApnhU?si=K_ntZOfyFCNe8duI",
    },
  ],
};

const courseQuestionImages = {
  course1: ["images/algorithm.avif", "images/afak.jpg"],
  course2: ["images/chem.avif", "images/green.jpg"],
  course3: ["images/BRING IT ON.png", "images/money.png"],
  course4: ["images/BRING IT ON.png", "images/money.png"],
  course5: ["images/BRING IT ON.png", "images/money.png"],
  // Add more courses and their question images here
};

function loadCourseVideos(courseId) {
  const videoContent = document.querySelector(`#${courseId} .video-content`);
  const videos = courseVideos[courseId];
  const questionImages = courseQuestionImages[courseId]; // Retrieve the question images for the course

  if (videos) {
    videos.forEach((video) => {
      const card = document.createElement("div");
      card.classList.add("card", "col-sm-12"); // col-md-6 will be overridden by CSS
      card.innerHTML = `
                <div class="card-body">
                    <h5 class="card-title">${video.title}</h5>
                    <iframe width="100%" height="315" src="${video.embed}" frameborder="0" allowfullscreen></iframe>
                    <button class="btn btn-primary mt-2" onclick="window.open('${video.url}', '_blank')">Watch Video</button>
                </div>
            `;
      videoContent.appendChild(card);
    });

    // Insert the question images after all the videos
    questionImages.forEach((questionImage) => {
      const questionImg = document.createElement("img");
      questionImg.src = questionImage;
      questionImg.classList.add("img-fluid", "w-100", "question-image");
      videoContent.appendChild(questionImg);
    });
  }
}

document.addEventListener("DOMContentLoaded", () => {
  showCourse("course1");
});
