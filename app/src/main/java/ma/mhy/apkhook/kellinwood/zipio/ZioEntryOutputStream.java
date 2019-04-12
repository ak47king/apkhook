package ma.mhy.apkhook.kellinwood.zipio;

/**
 * 项目名 HookAPK
 * 所在包 ma.mhy.hookapk.ma.mhy.apkhook.kellinwood.zipio
 * 作者 mahongyin
 * 时间 2019/4/8 11:45
 * 邮箱 mhy.work@qq.com
 * 描述 说明:
 */
import java.io.IOException;
import java.io.OutputStream;
import java.util.zip.CRC32;
import java.util.zip.Deflater;
import java.util.zip.DeflaterOutputStream;

public class ZioEntryOutputStream extends OutputStream {
    int size = 0;  // tracks uncompressed size of data
    CRC32 crc = new CRC32();
    int crcValue = 0;
    OutputStream wrapped;
    OutputStream downstream;

    public ZioEntryOutputStream( int compression, OutputStream wrapped)
    {
        this.wrapped = wrapped;
        if (compression != 0)
            downstream = new DeflaterOutputStream( wrapped, new Deflater( Deflater.BEST_COMPRESSION, true));
        else downstream = wrapped;
    }

    public void close() throws IOException {
        downstream.flush();
        downstream.close();
        crcValue = (int)crc.getValue();
    }

    public int getCRC() {
        return crcValue;
    }

    public void flush() throws IOException {
        downstream.flush();
    }

    public void write(byte[] b) throws IOException {
        downstream.write(b);
        crc.update(b);
        size += b.length;
    }

    public void write(byte[] b, int off, int len) throws IOException {
        downstream.write( b, off, len);
        crc.update( b, off, len);
        size += len;
    }

    public void write(int b) throws IOException {
        downstream.write( b);
        crc.update( b);
        size += 1;
    }

    public int getSize() {
        return size;
    }

    public OutputStream getWrappedStream()
    {
        return wrapped;
    }

}
