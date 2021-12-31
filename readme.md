# Discovery (WP)

Discovery is a clean, simple WordPress theme for writers & WooCommerce shops. 

## Notice
If you just want to download and use Discovery, download a release rather than this repositiory. If you are comfortable with Gulp & theme development, then clone the repo and go nuts.

[![Discovery](https://i.imgur.com/5m8EtL6.png)](https://i.imgur.com/5m8EtL6.png)

### Structure

The `/base/` folder contains the basic components for styling. These will contain the broad stroke styles that are applicable to most of the basic elements. For example you'll set the base font, line heights, typical heading styles, etc in `_typography`. Generic classes typically would live inside `_base`, and general form styling in `_forms`.

CSS should be structured into components. The each component would inheret the generics defined in the `_base` folder files, and the specifics of that component would be defined in their respective `component/*` file such as `components/_single_product.less`.

Furthering that example, the outer wrapping class on the `<section>` tag would inherit it's generic padding and margins from `_base/`, as would the inner `<div>` tag that wraps the content inside. Those would be overridden by the specific styles in the component.

Have look a short code example of a small component.
```
<section class="section announcement">
	<div class="inner">
		<h3>Hello there!</h3>
		<p><strong>Announcement Title Here</strong>Curabitur blandit tempus porttitor. Etiam porta sem <a href="#">malesuada magna mollis</a> euismod. Maecenas sed diam eget. </p>
		<a href="#" class="button">Learn More</a>
	</div>
</section>
```

In this short example, `.section` would be generic and provide defaults that apply to most sections of this type. `.announcement` would match the component name `components/_announcement.less`, and be used as the parent for the specific styles of this component. If this component differed from the generic, and for example, had a background image, that would be styled on `.announcement`. If the h3 tag differed from generic, that would be styled as `.announcement h3`.

This gives us a significant level of control while maintaining flexibility. We can really max that out by keeping specificity as low as possible.


### Specificty
In general the minimum level of specificity is to be maintained. Referencing the examples above, one might be tempted to write highly specific CSS, for example:

```
.section.announcement{
	>.inner{
		position: static;
		>h3{
			font-size: 1.3rem;
		}

		>p{
			font-size: 1.2rem;
			strong{
				font-weight: normal;
				font-style: italic;
			}

			>a{
				text-decoration: underline;

				&.button{
					background: #333;
				}
			}
		}
	}
}
```
But that would be both unnecessary and hard to maintain. It would also limit the control and flexibility of the content within. A better approach would be to reduce specificity;
```
.announcement{
	.inner{
		position: static;
	}
	
	h3{
		font-size: 1.3rem;
	}

	p{
		font-size: 1.2rem;
	}

	strong{
		font-weight: normal;
		font-style: italic;
	}

	a{
		text-decoration: underline;

		&.button{
			background: #333;
		}
	}
}
```
This is flexible, maintainable, and the result is the same. Now, there may be a reason to have a declaration just for when strong is inside the paragraph tag `p strong`, but unless there specifically is, it shouldn't be specified.


## JS
Javascript should be linked to your HTML files in it's uncompiled format during dev. There is no reason to use compiled JS in dev, and waiting 2-5 seconds depending on liobrary size and complexity before you can view a change each time you edit a file is a significant inconvenice. Therefor JS can most typically be recompiled when you need to test the compilation process or deploy.

### JS Structure
The base Library is jQuery simply because we use WordPress in the majority of our projects. Additional libraries should be added to the end of the HTML document right before jQuery but before the `script.js` file. 

The `script.js` file will house most (all) of your custom JS. If your custom scripting grows beyond the reasonable scope of a single file, break it down logically as to it's use, and include it after 3rd party libraries but before the `script.js` file.

## Images
Images should be places in `/src/img/` but your css should reference them from `/assets/` as that is where the compressed and optimized images reside (as well as all other compiled / transpiled assets).


## Gulp Usage
Gulp is used to compile and minify either the LESS, as well as the JS in the project. It also compresses and moves images from the `/src/img/` folder to `/assets/`. 

The gulp commands available to you are as follows:
`gulp` - the default gulp command will watch & compile your JS and LESS.

`gulp watchLess` - will watch & compile your LESS.

`gulp watchAllLess` - will watch & compile your JS, LESS, and minify your images.

`gulp watchJs` - will watch & compile your JS.

`gulp watchImg` - will watch & minify your images.

`gulp lessTask` - will compress your LESS and quit.

`gulp jsTask` - will compress your JS and quit.

`gulp imgTask` - will minify your images and quit.


## Installation
After cloning the repository, install the dependencies by running the following command in the `/tools/` directory:

```
npm install
```

