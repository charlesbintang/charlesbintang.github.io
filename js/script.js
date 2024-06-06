const modalImage = document.querySelector('.modal-body img')
const imageTrigger = document.querySelectorAll('[data-bs-target="#image-modal"] img')

imageTrigger.forEach(image => {
  image.addEventListener('click', () => {
    modalImage.src = image.src
    modalImage.alt = image.alt
  })
})

let scroll = window.requestAnimationFrame || function(callback) {window.setTimeout(callback, 1000/60)}

let elementToShow = document.querySelectorAll('.animation-scroll')

isElInViewPort = (el) => {
    let rect = el.getBoundingClientRect()

    return (
        (rect.top <= 0 && rect.bottom >= 0)
        ||
        (rect.bottom >= (window.innerHeight || document.documentElement.clientHeight) && rect.top <= (window.innerHeight || document.documentElement.clientHeight))
        ||
        (rect.top >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight))
    )
}

loop = () => {
    elementToShow.forEach((item, index) => {
        if (isElInViewPort(item)) {
            item.classList.add('start')
        } else {
            item.classList.remove('start')
        }
    })

    scroll(loop)
}

loop()