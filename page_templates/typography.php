<?php

/**
 * Template Name: Typography
 */
?>
<?php get_header(); ?>

<?php
/**
 * Functions hooked into `theme/index/header` action.
 *
 * @hooked webwp\Theme\Index\render_header - 10
 */
do_action('theme/index/header');
?>

<header>
    <h1>Website Header</h1>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</header>

<main>
    <section>
        <h2>Section Heading</h2>
        <p>This is a paragraph within a section. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </section>

    <article>
        <h3>Article Heading</h3>
        <p>This is a paragraph within an article. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <p><a href="#">This is a link</a></p>
        <ul>
            <li>Unordered list item 1</li>
            <li>Unordered list item 2</li>
            <li>Unordered list item 3</li>
        </ul>
        <ol>
            <li>Ordered list item 1</li>
            <li>Ordered list item 2</li>
            <li>Ordered list item 3</li>
        </ol>
    </article>

    <aside>
        <h4>Aside Heading</h4>
        <p>This is a paragraph within an aside. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </aside>

    <section>
        <h2>Typography Elements</h2>
        <h1>Heading 1</h1>
        <h2>Heading 2</h2>
        <h3>Heading 3</h3>
        <h4>Heading 4</h4>
        <h5>Heading 5</h5>
        <h6>Heading 6</h6>
        <p><strong>Strong text</strong></p>
        <p><em>Emphasized text</em></p>
        <p><mark>Marked text</mark></p>
        <p><small>Small text</small></p>
        <p><del>Deleted text</del> <ins>Inserted text</ins></p>
        <p><code>Code snippet</code></p>
        <pre><code>Preformatted text
with multiple lines
and some code.</code></pre>
        <blockquote>
            This is a blockquote. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </blockquote>
    </section>

    <section>
        <h2>Table Example</h2>
        <table>
            <thead>
                <tr>
                    <th>Header 1</th>
                    <th>Header 2</th>
                    <th>Header 3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Row 1, Cell 1</td>
                    <td>Row 1, Cell 2</td>
                    <td>Row 1, Cell 3</td>
                </tr>
                <tr>
                    <td>Row 2, Cell 1</td>
                    <td>Row 2, Cell 2</td>
                    <td>Row 2, Cell 3</td>
                </tr>
                <tr>
                    <td>Row 3, Cell 1</td>
                    <td>Row 3, Cell 2</td>
                    <td>Row 3, Cell 3</td>
                </tr>
            </tbody>
        </table>
    </section>
</main>

<footer>
    <p>Website Footer</p>
</footer>

<?php get_footer(); ?>