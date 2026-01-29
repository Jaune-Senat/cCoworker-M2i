    </main>
    <footer>
        
    </footer>

    <?php if (isset($scripts)) {
        foreach ($scripts as $script) { ?>
            <script src="assets/<?= $script ?>"></script>
        <?php }
    } ?>
</body>
</html>